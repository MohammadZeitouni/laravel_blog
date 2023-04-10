@props(['tags'])


<h3 class="mb-4 mt-4 font-semibold text-gray-900 dark:text-white uppercase ml-3 text-lg">Tags</h3>

@foreach ($tags as $item)
<ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center pl-3">
            <input name="tags[]" type="checkbox" value="{{$item->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="vue-checkbox-list" class="py-3 ml-2 w-full text-base font-medium text-gray-900 dark:text-gray-300">{{$item->tag}}</label>
            
        <form action="{{url('tag')}}/{{$item->id}}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button class="text-red-500 m-5 text-base font-bold" type="submit">
                DELETE
            </button>
            </form>
        </div>
    </li>
</ul>

@endforeach
