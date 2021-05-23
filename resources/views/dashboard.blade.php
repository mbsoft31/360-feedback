<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 py-8 bg-white rounded-lg shadow-sm">
                    <div class="px-6 py-6 text-xl font-semibold tracking-wide">
                        {{ __("Who you want to assess?") }}
                    </div>
                    <div class="px-6 py-6 space-y-3">
                        <div class="flex space-x-4 items-center">
                            <x-input.radio id="assessed" />
                            <x-input.label class="text-lg" for="assessed" :value="__('Suerviser')" />
                        </div>
                        <div class="flex space-x-4 items-center">
                            <x-input.radio id="assessed" />
                            <x-input.label class="text-lg" for="assessed" :value="__('Co-worker')" />
                        </div>
                        <div class="flex space-x-4 items-center">
                            <x-input.radio id="assessed" />
                            <x-input.label class="text-lg" for="assessed" :value="__('Inferior')" />
                        </div>
                    </div>
                    <div>
                        <x-button type="outline" color="indigo" >
                            {{ __("Continue") }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
