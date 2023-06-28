<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;
use Faker\Factory as Faker;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        // Generar 20 colores aleatorios
        for ($i = 0; $i < 20; $i++) {
            Color::create([
                'name' => $faker->colorName,
                'hex' => $faker->hexColor,
            ]);
        }
    }
}
