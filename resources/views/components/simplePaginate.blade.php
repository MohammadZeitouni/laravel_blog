@props(['name','text'])
<div class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($name->count())
        {{ $name->links() }}
    </div>
        
    @else
        <p class="text-center text-red-700 font-bold text-4xl">No {{$text}}</p>
    @endif
</div>