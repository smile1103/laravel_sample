@extends('layouts.master')

@section('content')

    <div class="alert alert-danger alert-dismissible alert-important" role="alert">

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>

        <strong>Oh Snap!</strong> {{ $exception->getMessage() }} Your Account is already Synced!

    </div>

@endsection