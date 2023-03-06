@extends('layouts.app')

@section('content')
    <div id="app">
        <article-component></article-component>
    </div>
@endsection

@section('view')
    @vite(['resources/js/app.js'])
@endsection
