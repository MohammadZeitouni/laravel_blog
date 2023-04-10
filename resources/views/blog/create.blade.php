@extends('layouts.app')
@section('content')


<x-main>Create Post</x-main>
<div class="container mx-auto  pt-15 pb-5">
    <form 
        action="/blog"
        method="POST"
        enctype="multipart/form-data"
    >
    @csrf
        <x-inpute.text name='title'/>
        <x-inpute.textarea name='description'>{{ old('description') }}</x-inpute.textarea>
        <div class="w-72 ml-5">
            <span class="text-gray-700 text-2xl uppercase ml-4"> add Tag</span>
            <select name="tags[]" class="block w-full mt-1" multiple>
                @foreach ($tags as $item)
                <option value="{{ $item->id }}" class="ml-2  hover:bg-gray-200 text-lg">{{ $item->tag }}</option>
                @endforeach
            </select>
        </div>   
        <x-inpute.image name='image' class='col-span-2'/>
        <x-inpute.button name='button' text='Submit the post' color='green'/>
    </form>
</div>
@endsection