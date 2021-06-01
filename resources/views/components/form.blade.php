@props(['action' => '#', 'args' => [], 'method' => 'POST'])

@php
    if( \Illuminate\Support\Facades\Route::has($action) ){
        $action = route($action, $args);
    }
@endphp

<form
    @if($action != '#' && !is_null($action)) action="{{ $action }}" @endif
    method="{{ $method != 'POST' ? 'POST' : $method }}"
    {{ $attributes->merge(["class" => "form"]) }}
>
    @method($method)
    @csrf

    {{ $slot }}
</form>
