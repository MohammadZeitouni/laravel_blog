@props(['name','text','color'])

<button 
type="submit"
name="{{$name}}"
class="
    bg-{{$color}}-700 hover:bg-{{$color}}-200
    text-gray-200 hover:text-{{$color}}-700
    transition duration-300
    cursor-pointer
    p-5 rounded-lg
    font-bold uppercase
"
>{{$text}}</button>
