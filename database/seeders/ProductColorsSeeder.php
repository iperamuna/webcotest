<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class ProductColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Black', 'description' => 'Black color', 'hex_code' => '#000000'],
            ['name' => 'White', 'description' => 'White color', 'hex_code' => '#FFFFFF'],
            ['name' => 'Red', 'description' => 'Red color', 'hex_code' => '#FF0000'],
            ['name' => 'Lime', 'description' => 'Lime green color', 'hex_code' => '#00FF00'],
            ['name' => 'Blue', 'description' => 'Blue color', 'hex_code' => '#0000FF'],
            ['name' => 'Yellow', 'description' => 'Yellow color', 'hex_code' => '#FFFF00'],
            ['name' => 'Cyan', 'description' => 'Cyan color', 'hex_code' => '#00FFFF'],
            ['name' => 'Magenta', 'description' => 'Magenta color', 'hex_code' => '#FF00FF'],
            ['name' => 'Silver', 'description' => 'Silver color', 'hex_code' => '#C0C0C0'],
            ['name' => 'Gray', 'description' => 'Gray color', 'hex_code' => '#808080'],
            ['name' => 'Maroon', 'description' => 'Maroon color', 'hex_code' => '#800000'],
            ['name' => 'Olive', 'description' => 'Olive green color', 'hex_code' => '#808000'],
            ['name' => 'Green', 'description' => 'Green color', 'hex_code' => '#008000'],
            ['name' => 'Purple', 'description' => 'Purple color', 'hex_code' => '#800080'],
            ['name' => 'Teal', 'description' => 'Teal color', 'hex_code' => '#008080'],
            ['name' => 'Navy', 'description' => 'Navy blue color', 'hex_code' => '#000080'],
        ];

        DB::table('product_colors')->insert($colors);
    }
}
