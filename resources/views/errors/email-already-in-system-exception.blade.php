@extends('layouts.master')

@section('content')

    <div class="alert alert-danger alert-dismissible alert-important" role="alert">

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>

        <strong>Oh Snap!</strong> {{ $exception->getMessage() }} Email Already In System.  Please log in using the login form and then sync accounts.

    </div>

@endsection