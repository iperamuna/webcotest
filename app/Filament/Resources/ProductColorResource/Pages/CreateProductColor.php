<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductColorResource\Pages;

use App\Filament\Resources\ProductColorResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateProductColor extends CreateRecord
{
    protected static string $resource = ProductColorResource::class;
}
