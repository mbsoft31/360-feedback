<x-form class="w-full" wire:submit.prevent="update" action="survey.update" :args="$survey" method="patch" csrf="true">
    <div class="px-6 py-2">
        <div class="divide-y1">
            <x-form.control>
                <x-input.label for="title" :value="__('survey.title')"/>
                <x-input.text id="title" value="{{$survey->title}}" class="w-full"/>
                <x-input.error for="title"/>
            </x-form.control>
            <x-form.control>
                <x-input.label for="description" :value="__('survey.description')"/>
                <x-input.area id="description" value="{{$survey->description}}" class="w-full"/>
                <x-input.error for="description"/>
            </x-form.control>
        </div>
    </div>
</x-form>
