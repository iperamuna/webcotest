<?php

declare(strict_types=1);

use App\Models\ProductType;
use App\Models\TypeAssignment;

it('to array', function () {
    $productCategory = TypeAssignment::factory()->create()->refresh();

    expect(array_keys($productCategory->toArray()))
        ->toBe([
            'id',
            'type_assignments_type',
            'type_assignments_id',
            'my_bonus_field',
            'type_id', // Creates a re
            'created_at',
            'updated_at',
        ]);
});

it('belongs to a type', function () {
    $productCategory = TypeAssignment::factory()->create();

    expect($productCategory->type)->toBeInstanceOf(ProductType::class);
});
