<x-filament::page>
    <div class="space-y-6 max-w-4xl">
        <h2 class="text-2xl font-semibold mb-4">Fill in the Address</h2>

        <x-filament::section heading="Fill in the Address">

            <form wire:submit.prevent="searchAddress" class="space-y-4">
                {{ $this->form }}
                <x-filament::button wire:click="searchAddress" class="w-full">
                    Submit
                </x-filament::button>
            </form>
        </x-filament::section>

    </div>
    @if($responseData)
    <div>
        <h2 class="text-2xl font-semibold mb-4">Address Details</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($responseData as $addressData)
                <label class="block text-sm font-medium ">{{ $addressData['Address'] }}</label>
            @endforeach
        </div>
        <div class="mt-6 mb-6">
            <x-filament::button wire:click="qualify" class="w-full">
                Qualify Address
            </x-filament::button>
        </div>

        @if($qualifyResponse)
        <x-filament::section heading="{{ $qualifyResponse['Result'] }}" class="rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mt-10" >
            <x-filament::section heading="Service Details"
                class="rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mb-4 mt-4">
            <x-filament::grid lg="4" class="gap-4">
                <x-filament::grid.column>
                    <b>Service Type</b> {{ $qualifyResponse['ServiceType'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>Service Class</b> {{ $qualifyResponse['ServiceClass'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>Connection Type</b> {{ $qualifyResponse['ConnectionType'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>Alternative Technology</b> {{ $qualifyResponse['AlternativeTechnology'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>Copper Disconnection Date</b> {{ $qualifyResponse['CopperDisconnectionDate'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>Zone</b> {{ $qualifyResponse['Zone'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>CSA</b> {{ $qualifyResponse['CSA'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>CVC ID</b> {{ $qualifyResponse['CVCID'] }}
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>Voice CVC ID</b> N/A
                </x-filament::grid.column>
                <x-filament::grid.column>
                    <b>Development Charge</b> {{ $qualifyResponse['DevelopmentCharge'] }}
                </x-filament::grid.column>
            </x-filament::grid>
            </x-filament::section>
            @if(isset($qualifyResponse['BroadbandAddressRecord']))
            <x-filament::section heading="Broadband Address Directory Details"
                class="rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mb-4 mt-4">
                <x-filament::grid lg="3" class="gap-4">
                    @foreach (XmlToDataHelper($qualifyResponse['BroadbandAddressRecord']) as $key => $value)
                        <x-filament::grid.column>
                            <b>{{ $key}}</b> {{ $value }}
                        </x-filament::grid.column>
                    @endforeach
                </x-filament::grid>
            </x-filament::section>
            @endif
            @if(isset($qualifyResponse['NBNCOATRecord']))
            <x-filament::section heading="NBN COAT Details"
                class="rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mb-4 mt-4">
                <x-filament::grid lg="4" class="gap-4">
                    @foreach (XmlToDataHelper($qualifyResponse['NBNCOATRecord']) as $key => $value)
                        <x-filament::grid.column>
                            <b>{{ $key }}</b> {{ $value }}
                        </x-filament::grid.column>
                    @endforeach
                </x-filament::grid>
            </x-filament::section>
            @endif
        </x-filament::section>
        @endif
    </div>
    @endif
</x-filament::page>
