<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Services\AsmorphicExtranetApiService;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

final class AddressFormPage extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $street_number;

    public $unit_number;

    public $street_name;

    public $street_type;

    public $suburb;

    public $postcode;

    public $state;

    public $responseData = null;

    public $qualifyResponse = null;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.address-form-page';

    public function mount()
    {
        $this->form->fill([
            'street_number' => '123',
            'unit_number' => '17',
            'street_name' => 'Main',
            'street_type' => 'Street',
            'suburb' => 'Kangaroo Point',
            'postcode' => '4169',
            'state' => 'QLD',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('street_number')
                ->label('Street Number')
                ->required(),

            TextInput::make('unit_number')
                ->label('Unit Number')
                ->nullable(),

            TextInput::make('street_name')
                ->label('Street Name')
                ->required(),

            TextInput::make('street_type')
                ->label('Street Type')
                ->required(),

            TextInput::make('suburb')
                ->label('Suburb')
                ->required(),

            TextInput::make('postcode')
                ->label('Postcode')
                ->numeric()
                ->required(),

            Select::make('state')
                ->label('State')
                ->options([
                    'QLD' => 'Queensland',
                    'NSW' => 'New South Wales',
                    'VIC' => 'Victoria',
                    'SA' => 'South Australia',
                    'WA' => 'Western Australia',
                    'TAS' => 'Tasmania',
                    'ACT' => 'Australian Capital Territory',
                    'NT' => 'Northern Territory',
                ])
                ->searchable()
                ->required(),
        ])->statePath('data');
    }

    public function searchAddress()
    {
        $this->responseData = null;

        $addressData = $this->data;

        $asmorphicExtranetApiService = new AsmorphicExtranetApiService();
        $response = $asmorphicExtranetApiService->findAddress(...$addressData);

        if ($response['result'] === 'Success') {
            $this->responseData = $response['data'];

            Notification::make()
                ->title('Addressed Found')
                ->success()
                ->send();

        } else {

            Notification::make()
                ->title('Addressed Not Found')
                ->body('Error: '.$response['message'])
                ->danger()
                ->send();

        }
    }

    public function qualify()
    {

        $qulifyID = $this->responseData[0]['DirectoryIdentifier'];
        $asmorphicExtranetApiService = new AsmorphicExtranetApiService();
        $response = $asmorphicExtranetApiService->qualifyService($qulifyID);

        if ($response['result'] === 'Success') {
            $this->qualifyResponse = $response['data'][0];

            Notification::make()
                ->title('Addresse Qlification Info')
                ->success()
                ->send();

        } else {
            $this->responseData = 'Error: '.$response['message'];
        }
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('street_number')->label('Street Number')->required(),
            TextInput::make('unit_number')->label('Unit Number')->nullable(),
            TextInput::make('street_name')->label('Street Name')->required(),
            TextInput::make('street_type')->label('Street Type')->required(),
            TextInput::make('suburb')->label('Suburb')->required(),
            TextInput::make('postcode')->label('Postcode')->required(),
            TextInput::make('state')->label('State')->required(),
            Forms\Components\Button::make('Submit Address')->action('submitAddress')->color('primary'),
            Forms\Components\Button::make('Qualify')->action('qualify')->color('success')->visible(fn () => $this->responseData !== null),
        ];
    }
}
