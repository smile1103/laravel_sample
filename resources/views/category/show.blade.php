@extends('layouts.master')

@section('title')

    <title>Category</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/category'>Categories</a></li>
        <li><a href='/category/{{ $category->id }}'>{{ $category->name }}</a></li>
    </ol>

    <h1>Category Details</h1>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->

        <table class="table table-striped">

            <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Date Created</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{ $category->id }} </td>
                <td> <a href="/category/{{ $category->id }}/edit">
                        {{ $category->name }}</a></td>
                <td>{{ $category->created_at }}</td>

                <td> <a href="/category/{{ $category->id }}/edit">

                        <button type="button" class="btn btn-default">Edit</button></a></td>

                <td>

                    <div class="form-group">

                        <form class="form" role="form" method="POST"
                              action="{{ url('/category/'. $category->id) }}">

                            <input type="hidden" name="_method" value="delete">

                            {{ csrf_field() }}

                            <input class="btn btn-danger" Onclick="return ConfirmDelete();"
                                   type="submit" value="Delete">

                        </form>

                    </div>

                </td>

            </tr>

            </tbody>

        </table>


    </div>

@endsection

@section('scripts')

    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            return x;
        }

    </script>

@endsection