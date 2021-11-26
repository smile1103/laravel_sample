@extends('layouts.master')

@section('title')

    <title>{{ $lesson->name }} Lesson</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/lesson'>lesson</a></li>
        <li><a href='/lesson/{{ $lesson->id }}'>{{ $lesson->name }}</a></li>
    </ol>

    <h1>{{ $lesson->name }}</h1>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->
        <table class="table table-striped">

            <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Date Created</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{ $lesson->id }} </td>
                <td> <a href="/lesson/{{ $lesson->id }}/edit">
                        {{ $lesson->name }}</a></td>
                <td>{{ $category->name }}</td>
                <td>{{ $subcategory->name}}</td>
                <td>{{ $lesson->created_at }}</td>
                <td> <a href="/lesson/{{ $lesson->id }}/edit">

                <button type="button" class="btn btn-default">

                      Edit

                 </button></a></td>

                <td>

                    <div class="form-group">

                        <form class="form" role="form" method="POST"
                              action="{{ url('/lesson/'. $lesson->id) }}">

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