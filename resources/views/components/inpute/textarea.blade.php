@props(['name'])
<textarea 
name="{{$name}}"
placeholder="{{$name}}"
class="w-full h-60 text-lg rounded-lg shadow-lg border-b p-15 mb-5"
{{ $attributes }}
>{{ $slot ?? old($name) }}</textarea>

<x-inpute.message-error name='{{$name}}'/>