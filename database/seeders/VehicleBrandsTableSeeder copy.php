<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleBrand;

class VehicleBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Acura'],
            ['name' => 'Alfa Romeo'],
            ['name' => 'Audi'],
            ['name' => 'BMW'],
            ['name' => 'Buick'],
            ['name' => 'Cadillac'],
            ['name' => 'Chevrolet'],
            ['name' => 'Chrysler'],
            ['name' => 'Dodge'],
            ['name' => 'Fiat'],
            ['name' => 'Ford'],
            ['name' => 'GMC'],
            ['name' => 'Honda'],
            ['name' => 'Hyundai'],
            ['name' => 'Infiniti'],
            ['name' => 'Jaguar'],
            ['name' => 'Jeep'],
            ['name' => 'Kia'],
            ['name' => 'Land Rover'], 
            ['name' => 'Lexus'],
            ['name' => 'Lincoln'],
            ['name' => 'Mazda'],
            ['name' => 'Mercedes-Benz'],
            ['name' => 'Mini'],
            ['name' => 'Mitsubishi'],
            ['name' => 'Nissan'],
            ['name' => 'Peugeot'],
            ['name' => 'Porsche'],
            ['name' => 'Ram'],
            ['name' => 'Renault'],
            ['name' => 'Seat'],
            ['name' => 'Subaru'],
            ['name' => 'Suzuki'],
            ['name' => 'Toyota'],
            ['name' => 'Volkswagen'],
            ['name' => 'Volvo'],

        ];

        foreach ($brands as $brand) {
            VehicleBrand::create($brand);
        }
    }
}
