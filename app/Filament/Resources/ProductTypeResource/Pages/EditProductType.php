<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductTypeResource\Pages;

use App\Filament\Resources\ProductTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

final class EditProductType extends EditRecord
{
    protected static string $resource = ProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
