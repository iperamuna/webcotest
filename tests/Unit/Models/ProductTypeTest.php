<?php

declare(strict_types=1);

use App\Models\Product;

test('to array', function () {
    $product = Product::factory()->create()->refresh();

    expect(array_keys($product->toArray()))
        ->toBe([
            'id',
            'name',
            'product_category_id',
            'product_color_id',
            'description',
            'created_at',
            'updated_at',
        ]);
});
