<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleType;

class VehicleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Sedan'],
            ['name' => 'Camioneta'],
            ['name' => 'SUV'],
            ['name' => 'Hatchback'],
            ['name' => 'Moto'],
            ['name' => 'Roadster'],
            ['name' => 'Coupe'],

        ];

        foreach ($brands as $brand) {
            VehicleType::create($brand);
        }
    }
}
