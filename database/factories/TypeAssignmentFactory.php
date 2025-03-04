<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeAssignment>
 */
final class TypeAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_assignments_type' => 'Product', // Assuming this polymorphic relationship is for products
            'type_assignments_id' => Product::factory(), // Creates a related product
            'my_bonus_field' => $this->faker->word(),
            'type_id' => ProductType::factory(), // Creates a related product type
        ];
    }
}
