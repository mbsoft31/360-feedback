@props(['color' => 'gray', 'type' => 'default'])

@php
    $types = [
        "default" => "inline-block px-2.5 py-1.5 text-sm rounded-md shadow-sm ring-offset-2 ring-$color-600 bg-$color-600 text-white",
        "outline" => "inline-block px-2.5 py-1.5 text-sm border rounded-md shadow-sm ring-offset-2 ring-$color-600 border-$color-600 text-gray-600",
    ];
    $colors = [
        "gray" => "focus:outline-none focus:ring-2 focus:bg-gray-700 focus:text-white hover:ring-2 hover:bg-gray-700 hover:text-gray-50",
        "blue" => "text-blue-700 focus:outline-none focus:ring-2 focus:bg-blue-700 focus:text-white hover:ring-2 hover:bg-blue-700 hover:text-gray-50",
        "indigo" => "text-indigo-700 focus:outline-none focus:ring-2 focus:bg-indigo-700 focus:text-white hover:ring-2 hover:bg-indigo-700 hover:text-gray-50",
        "red" => "text-red-700 focus:outline-none focus:ring-2 focus:bg-red-700 focus:text-white hover:ring-2 hover:bg-red-700 hover:text-gray-50",
        "green" => "text-green-700 focus:outline-none focus:ring-2 focus:bg-green-700 focus:text-white hover:ring-2 hover:bg-green-700 hover:text-gray-50",
    ];
@endphp

<button type="button" {{ $attributes->merge(["class" => $types[$type] . " " . $colors[$color]])  }}>
    {{ $slot }}
</button>
