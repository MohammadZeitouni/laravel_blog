@props(['name'])

<input 
type="text"
name="{{$name}}"
placeholder="{{$name}}"
{{ $attributes(['value' => old($name)]) }}
class="w-full h-20 text-6xl rounded-lg shadow-lg border-b p-15 mb-5"
>

<x-inpute.message-error name='{{$name}}'/>