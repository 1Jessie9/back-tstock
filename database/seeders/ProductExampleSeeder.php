<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\HardDriveSize;
use App\Models\HardDriveType;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandExample = Brand::create(['name' => 'Lenovo']);
        Brand::create(['name' => 'Acer']);
        Brand::create(['name' => 'HP']);
        Brand::create(['name' => 'Apple']);

        $hardSizeExample = HardDriveSize::create(['size' => 64]);
        HardDriveSize::create(['size' => 32]);
        HardDriveSize::create(['size' => 16]);
        HardDriveSize::create(['size' => 8]);
        HardDriveSize::create(['size' => 4]);

        $hardTypeExample = HardDriveType::create(['type' => 'HDD']);
        HardDriveType::create(['type' => 'SSD']);
        HardDriveType::create(['type' => 'HDD + SSD']);

        Product::create([
            'brand_id' => $brandExample->id,
            'hard_drive_type_id' => $hardSizeExample->id,
            'hard_drive_size_id' => $hardTypeExample->id,
            'title' => 'Portátil LENOVO',
            'description' => 'En el portátil LENOVO IdeaPad Slim 3 color Gris, encuentra todo el rendimiento que necesitas, un portátil elegante que cubre tus necesidades, su procesador serie H, Ram y almacenamiento en estado solido, es perfecto para tareas exigentes, con un diseño extraordinario y duradero, este equipo superará tus expectativas. Así mismo, te brindará interacción sorprendente gracias a su pantalla táctil y su conectividad premium. Te sentirás seguro gracias a su obturador de privacidad en su cámara, cuando termines tus reuniones o videollamadas solo tienes que cerrarlo. ¡lleva el tuyo ahora!',
            'price' => 2100000,
            'specifications' => '[
                {
                    id: 1,
                    name: "Procesador",
                    value: "8 GB",
                },
            ]',
            'enabled' => true,
        ]);
    }
}
