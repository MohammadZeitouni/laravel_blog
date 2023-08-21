@props(['name'])

<input
type="text"
name="{{$name}}"
placeholder="{{$name}}"
{{ $attributes(['value' => old($name)]) }}
class="w-full h-15 text-3xl rounded-lg shadow-lg border-b p-10 mb-5"
>

<x-inpute.message-error name='{{$name}}'/>
