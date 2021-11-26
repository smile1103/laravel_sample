@extends('layouts.master')

@section('title')

    <title>Marketing Images</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Marketing Images</li>
    </ol>

    <h2>Marketing Images</h2>

    <hr/>

    <marketing-image-grid></marketing-image-grid>

    <div> <a href="/marketing-image/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>

@endsection