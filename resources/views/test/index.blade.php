@extends('layouts.master')

@section('title')

    <title>Test Page</title>

@endsection

@section('content')

    <h1>Fruit Basket</h1>

    <div>

        <parent v-bind:items="items"></parent>
        <add-item v-on:itemcreated="addItem"></add-item>

    </div>



@endsection