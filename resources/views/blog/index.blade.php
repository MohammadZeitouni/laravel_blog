@extends('layouts.app')
@section('content')
    <x-main>All Posts</x-main>

    <div class="container mx-auto grid grid-cols-2 gap-2  pt-15 pb-5  border-b border-gray-300 ">

        @if (Auth::check())
            <div class="col-start">
                <x-link name='Create  Post' link='/create' color='green' padding='p-5'/>

            </div>
        @endif
        <x-search name='search' action='blog'/>
    </div>


    @if ($message = Session::get('successDeleted'))
        <x-message name='red'>{{$message}}</x-message>
    @endif
    @if ($message = Session::get('successCreated'))
        <x-message name='blue'>{{$message}}</x-message>
    @endif
        
    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li><x-message name='red'>{{$error}}</x-message></li>
                @endforeach
            </ul>
    @endif
    <x-post :posts='$posts'/>
    <x-simplePaginate :name='$posts' text='Posts'/>

@endsection
