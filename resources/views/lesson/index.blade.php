@extends('layouts.master')

@section('title')

    <title>Lessons</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Lessons</li>
    </ol>

    <h2>Lessons</h2>

    <hr/>

    <lesson-grid></lesson-grid>

    <div> <a href="/lesson/create">

     <button type="button" class="btn btn-lg btn-primary">

                Create New

            </button></a>

    </div>

@endsection