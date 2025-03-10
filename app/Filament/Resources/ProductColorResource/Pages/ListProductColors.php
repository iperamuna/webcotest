<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductColorResource\Pages;

use App\Filament\Resources\ProductColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

final class ListProductColors extends ListRecords
{
    protected static string $resource = ProductColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
