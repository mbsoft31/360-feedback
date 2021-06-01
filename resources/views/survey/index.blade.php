<x-app-layout>

    <x-slot name="header">
        <h1>
            {{ __('survey.all-surveys') }}
        </h1>
    </x-slot>

    <div class="max-w-5xl mx-auto">

        <div class="mt-6 flex items-center px-6">
            <div class="flex-grow">
                <h2 class="text-lg font-semibold tracking-wide">
                    {{ __('survey.all-surveys') }}
                </h2>
            </div>
            <div>
                <a href="{{route('survey.create')}}" class="block px-3 py-1.5 text-blue-700 border border-blue-700 text-sm hover:text-white hover:bg-blue-700 tracking-normal text-center whitespace-nowrap align-middle cursor-pointer  rounded-md">
                    {{ __('survey.create-new-survey') }}
                </a>
            </div>
        </div>

        <div class="mt-6 p-4 rounded-md overflow-hidden">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('survey.title') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('survey.description') }}
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($surveys as $survey)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $survey->title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $survey->description }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 space-x-2 whitespace-nowrap text-end text-sm font-medium">
                                            <a href="{{route('survey.edit', $survey)}}" class="inline-block text-indigo-600 hover:text-indigo-900">{{__('Edit')}}</a>
                                            <a href="{{route('survey.delete', $survey)}}" class="inline-block text-red-600 hover:text-red-900">{{__('Delete')}}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">
                                                {{ __('nothing to show !') }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="px-6 py-2 mt-4 bg-white rounded-md shadow">
                            {{ $surveys->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
