@extends('layouts.master')

@section('title')

    <title>Create a Lesson</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/lesson'>Lessons</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a New Lesson</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/lesson') }}">

    {{ csrf_field() }}

    <!-- lesson name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Lesson Name</label>

            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))

                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>

            @endif

        </div>

        <lesson-create-category

                :categories="{{ json_encode($categories) }}"
                :subcategories="{{ json_encode($subcategories) }}">

        </lesson-create-category>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Create

            </button>

        </div>

    </form>

    @include('errors.list')

@endsection