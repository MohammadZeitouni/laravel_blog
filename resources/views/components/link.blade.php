@props(['name','link','color','padding'])
<a href="{{url('blog')}}{{$link}}" 
class=" bg-{{$color}}-700 hover:bg-{{$color}}-200
        text-gray-200 hover:text-{{$color}}-700
        transition duration-300
        cursor-pointer
        {{$padding}} rounded-lg mr-3
        font-bold uppercase">
{{$name}}
</a>