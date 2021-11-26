@extends('layouts.master')

@section('title')

    <title>Categories</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Categories</li>
    </ol>

    <h2>Categories</h2>

    <hr/>

    <category-grid></category-grid>

    <div> <a href="/category/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


@endsection