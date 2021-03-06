<x-app-layout>

    <x-slot name="header">
        <h1 class="flex-grow text-gray-900 text-2xl tracking-wide font-semibold ">
            {{ __('survey.create-new-survey') }}
        </h1>
    </x-slot>

    <div class="mt-10 max-w-5xl mx-auto bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 flex justify-end items-center space-x-3 border-b">
            <h1 class="flex-grow text-gray-900 text-2xl tracking-wide font-semibold ">
                {{ __('survey.create-new-survey') }}
            </h1>
        </div>
        <div class="modal-body">
            <x-survey.create-form />
        </div>

        <div class="px-6 py-4 flex justify-end items-center space-x-3 border-t">
            <h1 class="flex-grow"></h1>
            <button  type="button" class="block px-3 py-1.5 text-gray-700 border border-gray-700 text-sm hover:text-white hover:bg-gray-700 tracking-normal text-center whitespace-nowrap align-middle cursor-pointer  rounded-md">
                {{ __('Cancel') }}
            </button>
            <button class="block px-3 py-1.5 text-blue-700 border border-blue-700 text-sm hover:text-white hover:bg-blue-700 tracking-normal text-center whitespace-nowrap align-middle cursor-pointer  rounded-md">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</x-app-layout>
