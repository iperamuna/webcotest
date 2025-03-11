<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\ViewRecord;

final class ProductDetails extends ViewRecord
{
    protected static string $resource = ProductResource::class;
}
