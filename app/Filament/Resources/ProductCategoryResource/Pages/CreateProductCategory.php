<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\ProductCategoryResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;
}
