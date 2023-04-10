@props(['name'])

@error($name)
<div class="p-4 mb-4 text-md text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <span class="font-medium">Please !</span> {{$message}}
</div>
@enderror