<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductCategoryResource\RelationManagers;

use App\Models\ProductType;
use App\Models\TypeAssignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

final class TypeAssignmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'typeAssignments';

    protected static ?string $title = 'Types';

    public static function query(EloquentBuilder $query): EloquentBuilder
    {
        return $query->with('type'); // Eager-load the `type` relationship
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('bonus')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('type.name')->label('Type Name'),
                Tables\Columns\TextColumn::make('my_bonus_field')->label('Bonus'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Product Type')
                    ->action(fn (array $data) => $this->createTypeAssignment($data)),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mountUsing(function (Forms\ComponentContainer $form, Model $record) {
                        $form->fill([
                            'name' => $record->type?->name,
                            'bonus' => $record->my_bonus_field,
                        ]);
                    })
                    ->action(function (array $data, Model $record) {
                        // Update ProductType name
                        if ($record->type) {
                            $record->type->update(['name' => $data['name']]);
                        }

                        // Update TypeAssignment bonus
                        $record->update([
                            'my_bonus_field' => $data['bonus'],
                        ]);
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected function createTypeAssignment(array $data): void
    {

        $product = $this->getOwnerRecord(); // Get the related Product model

        // Create a new ProductType
        $productType = ProductType::create(['name' => $data['name']]);

        // Create a polymorphic TypeAssignment
        TypeAssignment::create([
            'type_assignments_type' => get_class($product),
            'type_assignments_id' => $product->id,
            'type_id' => $productType->id,
            'my_bonus_field' => $data['bonus'],
        ]);
    }
}
