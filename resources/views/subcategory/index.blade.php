@extends('layouts.master')

@section('title')

    <title>Subcategories</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Subcategories</li>
    </ol>

    <h2>Subcategories</h2>

    <hr/>

    <subcategory-grid></subcategory-grid>

    <div> <a href="subcategory/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


@endsection