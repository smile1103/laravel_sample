@extends('layouts.master')

@section('title')

    <title>Create a Category</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/category'>Categories</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a New Category</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/category') }}">

    {{ csrf_field() }}

    <!-- Category Name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Category Name</label>

            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))

                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>

            @endif

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Create

            </button>

        </div>

    </form>

@endsection