@extends('layouts.app')
@section('content')

<x-main>Edit Post</x-main>
<div class="container mx-auto  pt-15 pb-5">
    <form 
        action="/blog/{{$post->slug}}"
        method="POST"
        enctype="multipart/form-data"
    >
    @csrf
    @method('PUT')
            <x-inpute.text name='title' :value="old('title', $post->title)"/>
            <x-inpute.textarea name='description'>{{ old('description', $post->description) }}</x-inpute.textarea>
            <x-inpute.image name='image' :value="old('image', $post->image)" />
            <img src="{{asset('storage/' . $post->image)}}" alt="" class="rounded-xl ml-6 mb-4" width="140">
            <x-inpute.button name='button' text='Edit the post' color='green'/>
    </form>
</div>
@endsection