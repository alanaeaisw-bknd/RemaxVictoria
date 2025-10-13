<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Permission::create([
            'name' => 'full',
            'description' => 'Permisos completos',
            'type' => 'full',
        ]);

        \App\Models\Permission::create([
            'name' => 'limited',
            'description' => 'Permisos limitados',
            'type' => 'limited',
        ]);
    }
}
