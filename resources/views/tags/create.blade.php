@extends('layouts.app')
@section('title')
   Create Tag
@endsection
@section('content')


<x-main>Create Tag</x-main>
<div class="container mx-auto  pt-15 pb-5">
    <form
        action="/tag"
        method="POST"
    >
    @csrf
        <x-inpute.text name='tag'/>
        <x-inpute.button name='button' text='Submit the tag' color='green'/>
    </form>
</div>
@endsection
