@extends('layouts.master')

@section('title')

    <title>Create a Profile</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Create Profile</li>
    </ol>

    <h2>Create Your Profile</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/profile') }}">

    {{ csrf_field() }}

    <!-- first_name Form Input -->

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

            <label class="control-label">First Name</label>

            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

            @if ($errors->has('first_name'))

                <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- last_name Form Input -->

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

            <label class="control-label">Last Name</label>

            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

            @if ($errors->has('last_name'))

                <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- birthdate Form Input -->

        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">

            <label class="control-label">Birthdate</label>

            <div>

                {{  Form::date('birthdate') }}

            </div>

            @if ($errors->has('birthdate'))

                <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
                </span>

            @endif

        </div>

        <!-- Gender Form Input -->

        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

            <label class="control-label">Gender</label>


            <select class="form-control" id="gender" name="gender">

                <option value="{{old('gender')}}">
                    {{ ! is_null(old('gender')) ?
                    (old('gender') == 1 ? 'Male' :'Female')
                    : 'Please Choose One'}}</option>
                <option value="1">Male</option>
                <option value="0">Female</option>

            </select>


            @if ($errors->has('gender'))

                <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
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