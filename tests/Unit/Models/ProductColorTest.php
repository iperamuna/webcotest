<?php

declare(strict_types=1);

use App\Models\ProductColor;

it('to array', function () {
    $productColor = ProductColor::factory()->create()->refresh();

    expect(array_keys($productColor->toArray()))
        ->toBe([
            'id',
            'name',
            'description',
            'hex_code',
            'created_at',
            'updated_at',
        ]);
});

it('has many products', function () {
    $productColor = ProductColor::factory()->hasProducts(3)->create();

    expect($productColor->products)->toHaveCount(3);
});
