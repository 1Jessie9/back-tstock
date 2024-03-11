<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\HardDriveSize;
use App\Models\HardDriveType;
use App\Models\Product;
use App\Models\ProductAdditionalInfo;
use App\Models\ProductGallery;
use App\Models\RAMOption;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creación de Marcas
        $brandExample = Brand::create(['name' => 'Lenovo']);
        Brand::create(['name' => 'Acer']);
        Brand::create(['name' => 'HP']);
        Brand::create(['name' => 'Apple']);

        // Creación de tamaños de discos duros
        $hardSizeExample = HardDriveSize::create(['size' => 64]);
        HardDriveSize::create(['size' => 32]);
        HardDriveSize::create(['size' => 16]);
        HardDriveSize::create(['size' => 8]);
        HardDriveSize::create(['size' => 4]);

        // Creación de tipos de discos duros
        $hardTypeExample = HardDriveType::create(['type' => 'HDD']);
        HardDriveType::create(['type' => 'SSD']);
        HardDriveType::create(['type' => 'HDD + SSD']);

        // Creación de rams
        $ramExample = RAMOption::create(['size' => 64]);
        RAMOption::create(['size' => 32]);
        RAMOption::create(['size' =>  16]);
        RAMOption::create(['size' =>  8]);
        RAMOption::create(['size' =>  4]);

        // Descripción del producto en json
        $specificationsJson = json_encode('[
            {
                id: 1,
                name: "Procesador",
                value: "8 GB",
            },
            {
                id: 2,
                name: "Disco",
                value: "SSD 512 GB",
            },
            {
                id: 3,
                name: "Procesador",
                value: "Intel Core I5",
            },
            {
                id: 4,
                name: "Sistema Operativo",
                value: "Windows",
            },
            {
                id: 5,
                name: "Modelo del Procesador",
                value: "12450H",
            },
            {
                id: 6,
                name: "Tonalidad de Color",
                value: "Gris",
            },
            {
                id: 7,
                name: "Tamaño Pantalla",
                value: "15.6  Pulgadas",
            },
        ]');
        // Creación del producto
        $product = Product::create([
            'brand_id' => $brandExample->id,
            'hard_drive_type_id' => $hardSizeExample->id,
            'hard_drive_size_id' => $hardTypeExample->id,
            'ram_id' => $ramExample->id,
            'title' => 'Portátil LENOVO',
            'description' => 'En el portátil LENOVO IdeaPad Slim 3 color Gris, encuentra todo el rendimiento que necesitas, un portátil elegante que cubre tus necesidades, su procesador serie H, Ram y almacenamiento en estado solido, es perfecto para tareas exigentes, con un diseño extraordinario y duradero, este equipo superará tus expectativas. Así mismo, te brindará interacción sorprendente gracias a su pantalla táctil y su conectividad premium. Te sentirás seguro gracias a su obturador de privacidad en su cámara, cuando termines tus reuniones o videollamadas solo tienes que cerrarlo. ¡lleva el tuyo ahora!',
            'price' => 2100000,
            'specifications' => $specificationsJson,
            'enabled' => true,
        ]);

        // Especificaciones json
        $featuresJson = json_encode('[
            { id: 1, name: "Resolución Full HD, imágenes mas nítidas." },
            { id: 2, name: "Pantalla multi-touch, fácil interacción con tus contenidos" },
            { id: 3, name: "Prueba militar MIL-STD-810H aprobada, mayor durabilidad" },
            { id: 4, name: "TrueBlock privacidad para tu cámara" },
            { id: 5, name: "Lector de huella, acceso fácil y seguro" },
        ]');

        // Información adicional del producto
        ProductAdditionalInfo::create([
            'product_id' => $product->id,
            'title' => "Da un gran paso adelante LENOVO IdeaPad Slim 3",
            'description' => "Con su asombrosa duración de la batería de hasta 22 horas y su espectacular pantalla Liquid Retina XDR, es un portátil pro sin rival.",
            'image_path' => "https://www.ktronix.com/medias/1400Wx1400H-master-hotfolder-transfer-incoming-deposit-hybris-interfaces-IN-media-product-197532261341-010.jpg?context=bWFzdGVyfGltYWdlc3wyNzIyMjB8aW1hZ2UvanBlZ3xhRE5qTDJobFlTOHhOREExTURZMU9ETTROVGsxTUM4eE5EQXdWM2d4TkRBd1NGOXRZWE4wWlhJdmFHOTBabTlzWkdWeUwzUnlZVzV6Wm1WeUwybHVZMjl0YVc1bkwyUmxjRzl6YVhRdmFIbGljbWx6TFdsdWRHVnlabUZqWlhNdlNVNHZiV1ZrYVdFdmNISnZaSFZqZEM4eE9UYzFNekl5TmpFek5ERmZNREV3TG1wd1p3fDEwNWY2MjExYzMxODEyYjU0NzNmOTdlNTcyODFjMWFiNzRmY2RhYTExZGM0YzJmNGE2NjZlOTkwMmUwNWE5Yjc",
            'features' => $featuresJson,
            'enabled' => true,
        ]);

        // Galería del producto
        ProductGallery::create([
            'product_id' => $product->id,
            'image_path' => "https://exitocol.vtexassets.com/arquivos/ids/21481865/Computador-Portatil-HP-Pavilion-Intel-Core-i5-1235U-RAM-8-GB-512-GB-SSD-15-eg2519la-3488673_d.jpg?v=638430217291770000",
            'enabled' => true,
        ]);
        ProductGallery::create([
            'product_id' => $product->id,
            'image_path' => "https://exitocol.vtexassets.com/arquivos/ids/21481863/Computador-Portatil-HP-Pavilion-Intel-Core-i5-1235U-RAM-8-GB-512-GB-SSD-15-eg2519la-3488673_b.jpg?v=638430217288930000",
            'enabled' => true,
        ]);
        ProductGallery::create([
            'product_id' => $product->id,
            'image_path' => "https://exitocol.vtexassets.com/arquivos/ids/21481866/Computador-Portatil-HP-Pavilion-Intel-Core-i5-1235U-RAM-8-GB-512-GB-SSD-15-eg2519la-3488673_e.jpg?v=638430217293370000",
            'enabled' => true,
        ]);
        ProductGallery::create([
            'product_id' => $product->id,
            'image_path' => "https://exitocol.vtexassets.com/arquivos/ids/21481865/Computador-Portatil-HP-Pavilion-Intel-Core-i5-1235U-RAM-8-GB-512-GB-SSD-15-eg2519la-3488673_d.jpg?v=638430217291770000",
            'enabled' => true,
        ]);

        // Creación de usuarios
        User::factory(10)->create();
        $userAdminExample = User::first();
        $userAdminExample->assignRole('superAdmin');

        // Creación de comentarios
        Comment::create([
            'product_id' => $product->id,
            'user_id' => $userAdminExample->id,
            'score' => 4.5,
            'comment' => 'Me encantó este producto, es muy funcional y la entrega fue rápida.',
            'enabled' => true,
            'deleted' => false,
        ]);
    }
}
