@extends('layouts.master')

@section('content')

    <div class="alert alert-danger alert-dismissible alert-important" role="alert">

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>

        <strong>Oh Snap!</strong> Your social provider,  {{ $exception->getMessage() }}, did not provide an email.
        Please check the settings on your social Provider's account and try again.

    </div>

@endsection