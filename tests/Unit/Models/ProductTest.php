<?php

declare(strict_types=1);

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;

it('to array', function () {
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

it('belongs to a category', function () {
    $product = Product::factory()->create();

    expect($product->category)->toBeInstanceOf(ProductCategory::class);
});

it('belongs to a color', function () {
    $product = Product::factory()->create()->refresh();

    expect($product->color)->toBeInstanceOf(ProductColor::class);
});
