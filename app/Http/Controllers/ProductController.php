<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAdditionalInfo;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $hasRole = $request->user()->hasRole('superAdmin');
        if (!$hasRole) return null;

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric|min:100000',
            'brand_id' => 'required|exists:brands,id',
            'hard_drive_type_id' => 'required|exists:hard_drive_types,id',
            'hard_drive_size_id' => 'required|exists:hard_drive_sizes,id',
            'ram_id' => 'required|exists:ram_options,id',
            'images' => 'required|array',
            'images.*.image_path' => 'required|string',
            'additional_info.title' => 'required|string',
            'additional_info.description' => 'required|string',
            'additional_info.image_path' => 'required|string',
            'additional_info.features' => 'required|array',
            'additional_info.features.*.name' => 'required|string',
            'specifications' => 'required|array',
            'specifications.*.name' => 'required|string',
            'specifications.*.value' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $specifications = $request->input('specifications');
        $specificationsJson = json_encode($specifications);

        $product = Product::create(array_merge(
            $request->only([
                'brand_id', 'hard_drive_type_id', 'hard_drive_size_id', 'ram_id',
                'title', 'description', 'price'
            ]),
            [
                'enabled' => true,
                'specifications' => $specificationsJson,
            ]
        ));

        $additionalInfo = $request->input('additional_info');
        $featuresJson = json_encode($additionalInfo['features']);
        ProductAdditionalInfo::create([
            'product_id' => $product->id,
            'title' => $additionalInfo['title'],
            'description' => $additionalInfo['description'],
            'image_path' => $additionalInfo['image_path'],
            'features' => $featuresJson,
            'enabled' => true,
        ]);

        $images = $request->input('images');
        foreach ($images as $image) {
            ProductGallery::create([
                'product_id' => $product->id,
                'image_path' => $image['image_path'],
                'enabled' => true,
            ]);
        }

        return response()->json(['message' => 'Product created successfully!', 'product' => $product], 201);
    }

    public function getProducts(Request $request)
    {
        $query = Product::with(['additionalInfo', 'gallery']);

        // Filtros
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }
        if ($request->filled('ram_id')) {
            $query->where('ram_id', $request->ram_id);
        }
        if ($request->filled('hard_drive_type_id')) {
            $query->where('hard_drive_type_id', $request->hard_drive_type_id);
        }
        if ($request->filled('hard_drive_size_id')) {
            $query->where('hard_drive_size_id', $request->hard_drive_size_id);
        }

        // Ordenamiento
        if ($request->filled('sort_by') && $request->filled('order')) {
            $sortBy = $request->sort_by; // 'title' o 'price'
            $order = $request->order; // 'ASC' o 'DESC'
            $query->orderBy($sortBy, $order);
        }

        $products = $query->where('enabled', true)
            ->get();

        return response()->json($products);
    }

    public function getProductById(Request $request)
    {
        $query = Product::with(['additionalInfo', 'gallery'])
            ->where('id', $request->id)
            ->first();

        return response()->json($query);
    }

    public function destroyImage(Request $request)
    {
        $hasRole = $request->user()->hasRole('superAdmin');
        if (!$hasRole) return null;

        $query = ProductGallery::find($request->id)->delete();

        return response()->json($query);
    }

    public function updateProductTitle(Request $request)
    {
        // Validación de datos de entrada
        $validated = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
        ]);

        $user = $request->user();
        if (!$user->hasRole('superAdmin')) {
            // Devolver respuesta para acceso no autorizado
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $product = Product::find($request->id);
        if (!$product) {
            // Devolver respuesta si el producto no se encuentra
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $product->update(['title' => $request->title]);

        return response()->json($product);
    }
}
