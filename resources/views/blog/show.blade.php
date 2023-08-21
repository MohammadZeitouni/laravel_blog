@extends('layouts.app')
@section('title')
   Show Post
@endsection
@section('content')

<div class="container mx-auto text-center pt-15 pb-5">
    <h1 class="text-6xl font-bold">{{$post->title}}</h1>
    <div class="mt-2">
        By : <span class="text-gray-500 italic">{{$post->user->username}}</span>
        on <span class="text-gray-500 italic">{{ date('d-m-Y',strtotime($post->updated_at)) }}</span>
    </div>

</div>
@if ($message = Session::get('successUpdated'))
<x-message name='green'>{{$message}}</x-message>
@endif

<div class="container mx-auto  pt-15 pb-5">
    <div class="flex h-96">
        <img class="object-cover w-full" src="{{asset('storage/' . $post->image)}}">
    </div>

    <div class="text-l text-gray-700 py-8 leading-6 border-b border-gray-300">
        {{$post->description}}
    </div>
    @if ($post->tags->count() !=0)
    <div class="m-5">
        <ul class="text-2xl flex"> <span class="text-gray-500 italic">Tags : </span>
        @foreach ($post->tags as $item)
            <li class="ml-4">{{$item->tag}}</li>
        @endforeach
        </ul>
    </div>

    @endif
</div>

<div class="container mx-auto flex justify-between mt-3">
    <div class="mt-3">
        <x-link name='Back' link='/' color='gray' padding='p-4'/>
    </div>
    <div>
        @if (Auth::user() && Auth::user()->id == $post->user_id)

        <x-link name='Edit Post' link='/{{$post->slug}}/edit' color='green' padding='p-5'/>

        <form action="{{url('blog')}}/{{$post->slug}}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
                <x-inpute.button name='button' text='Delete Post' color='red'/>
            </form>
    @endif
    </div>
</div>
@endsection

