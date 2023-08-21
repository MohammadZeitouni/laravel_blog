@extends('layouts.app')
@section('title')
   Tag Page
@endsection
@section('content')
    <x-main>All Tags</x-main>

    <div class="container mx-auto grid grid-cols-2 gap-2  pt-15 pb-5  border-b border-gray-300 ">

        @if (Auth::check())
            <div class="col-start">
                <x-tags.linkTag name='Create Tag' link='/create' color='green'/>
            </div>
        @endif
        <x-search name='search' action='tag'/>
    </div>
    <div class="container mx-auto">
        <x-tags.tag :tags='$tags'/>
    </div>
<x-simplePaginate :name='$tags' text='Tags'/>
@endsection
