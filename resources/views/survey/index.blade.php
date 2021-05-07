<div>

    <div class="space-y-4">
        <div class="rounded-md bg-white">
            <div class="px-6 py-2 flex justify-end items-center space-x-3 border-b">
                <h1 class="flex-grow text-gray-900 text-2xl tracking-wide font-semibold ">
                    {{ __('Survey.CreateNewSurvey') }}
                </h1>
                <button class="block px-3 py-1.5 text-gray-700 border border-gray-700 text-sm hover:text-white hover:bg-gray-700 tracking-normal text-center whitespace-nowrap align-middle cursor-pointer  rounded-md">
                    {{ __('Cancel') }}
                </button>
                <button class="block px-3 py-1.5 text-blue-700 border border-blue-700 text-sm hover:text-white hover:bg-blue-700 tracking-normal text-center whitespace-nowrap align-middle cursor-pointer  rounded-md">
                    {{ __('Save') }}
                </button>
            </div>

            <x-survey.create-form />

            <div class="px-6 py-2 flex justify-end items-center space-x-3 border-t">
                <h1 class="flex-grow"></h1>
                <button class="block px-3 py-1.5 text-gray-700 border border-gray-700 text-sm hover:text-white hover:bg-gray-700 tracking-normal text-center whitespace-nowrap align-middle cursor-pointer  rounded-md">
                    {{ __('Cancel') }}
                </button>
                <button class="block px-3 py-1.5 text-blue-700 border border-blue-700 text-sm hover:text-white hover:bg-blue-700 tracking-normal text-center whitespace-nowrap align-middle cursor-pointer  rounded-md">
                    {{ __('Save') }}
                </button>
            </div>
        </div>

        <div class="rounded-md bg-white">
            <div class="p-4">

                <div class="table">

                </div>

            </div>
        </div>
    </div>

</div>
