@props(["id", "value" => ""])
<textarea
    id="{{$id}}"
    name="{{$id}}"
    {{ $attributes->merge(['class' => "form-textarea rounded-md", "rows" => "2" ]) }}
>{!!$value!!}</textarea>
