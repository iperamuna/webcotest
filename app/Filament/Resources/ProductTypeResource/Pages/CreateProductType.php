<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductTypeResource\Pages;

use App\Filament\Resources\ProductTypeResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateProductType extends CreateRecord
{
    protected static string $resource = ProductTypeResource::class;
}
