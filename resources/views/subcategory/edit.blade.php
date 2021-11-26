@extends('layouts.master')

@section('title')

    <title>Edit Subcategory</title>

@endsection

@section('content')


    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/subcategory'>Subcategories</a></li>
        <li><a href='/subcategory/{{$subcategory->id}}'>{{$subcategory->name}}</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h1>Edit Subcategory</h1>

    <hr/>


    <form class="form" role="form" method="POST" action="{{ url('/subcategory/'. $subcategory->id) }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Subcategory Name</label>

            <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}">

            @if ($errors->has('name'))

                <span class="help-block">

        <strong>{{ $errors->first('name') }}</strong>

        </span>

            @endif

        </div>



    <!-- Category Form Select -->

    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

        <label for="category_id">Category Name:</label>

        <select class="form-control" name="category_id">

            <option value="{{ $oldId }}">{{ $oldValue }}</option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach

        </select>



        @if ($errors->has('category_id'))

            <span class="help-block">

        <strong>{{ $errors->first('category_id') }}</strong>

        </span>

        @endif


    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg">
            Edit
        </button>
    </div>

    </form>


@endsection