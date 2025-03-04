<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
final class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'product_category_id' => ProductCategory::factory(),
            'product_color_id' => ProductColor::factory(),
            'description' => $this->faker->sentence,
        ];
    }
}
