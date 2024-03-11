<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSuperAdmin = Role::create(['name' => 'superAdmin']);
        $roleAdmin = Role::create(['name' => 'admin']);

        // Crear permisos
        $createProduct = Permission::create(['name' => 'product.create']);
        $editProduct = Permission::create(['name' => 'product.edit']);
        $deleteProduct = Permission::create(['name' => 'product.delete']);

        // Asignar todos los permisos
        $roleSuperAdmin->givePermissionTo([$createProduct, $editProduct, $deleteProduct]);
        $roleAdmin->givePermissionTo([$createProduct, $editProduct, $deleteProduct]);
    }
}
