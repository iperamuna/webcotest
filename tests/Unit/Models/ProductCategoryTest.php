<?php

declare(strict_types=1);

use App\Models\ProductCategory;

it('to array', function () {
    $productCategory = ProductCategory::factory()->create()->refresh();

    expect(array_keys($productCategory->toArray()))
        ->toBe([
            'id',
            'name',
            'description',
            'external_url',
            'created_at',
            'updated_at',
        ]);
});

it('has many products', function () {
    $productCategory = ProductCategory::factory()->hasProducts(3)->create();

    expect($productCategory->products)->toHaveCount(3);
});
