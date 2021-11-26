@extends('layouts.master')

@section('title')

    <title>Edit Lesson</title>

@endsection

@section('content')


    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/lesson'>Lessons</a></li>
        <li><a href='/lesson/{{$lesson->id}}'>{{$lesson->name}}</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h1>Edit Lesson</h1>

    <hr/>


    <form class="form" role="form" method="POST" action="{{ url('/lesson/'. $lesson->id) }}">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

    <!-- lesson name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Lesson Name</label>

            <input type="text" class="form-control" name="name" value="{{ $lesson->name }}">

            @if ($errors->has('name'))

                <span class="help-block">

                     <strong>{{ $errors->first('name') }}</strong>

                </span>

            @endif

        </div>

            <lesson-edit-category  :category="{{ json_encode($category) }}"
                                   :categories="{{ json_encode($categories) }}"
                                   :subcategory="{{ json_encode($subcategory) }}"
                                   :subcategories="{{ json_encode($subcategories) }}"

            ></lesson-edit-category>

        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Edit

            </button>

        </div>

    </form>

    @include('errors.list')


@endsection