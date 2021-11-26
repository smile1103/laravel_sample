@extends('layouts.master')

@section('title')

    <title>Profile</title>

@endsection

@section('content')

    @if(Auth::user()->isAdmin())

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/profile'>Profiles</a></li>
            <li><a href='/profile/create'></a>Create</li>
        </ol>

    @else

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/profile/create'></a>Create</li>
        </ol>

    @endif



    <h1>{{ $profile->fullName() }}</h1>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->
        <table class="table table-striped">
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
                @if(Auth::user()->adminOrCurrentUserOwns($profile))
                    <th>Edit</th>
                @endif
                <th>Delete</th>

            </tr>


            <tr>
                <td>{{ $profile->id }} </td>
                <td> <a href="/profile/{{ $profile->id }}/edit">
                        {{ $profile->fullName() }}</a></td>
                <td>{{ $profile->showGender($profile->gender) }}</td>
                <td>{{ $profile->birthdate->format('m-d-Y') }}</td>

                @if(Auth::user()->adminOrCurrentUserOwns($profile))

                    <td> <a href="/profile/{{ $profile->id }}/edit">

                            <button type="button" class="btn btn-default">Edit</button></a></td>

                @endif

                <td>
                    <div class="form-group">

                        <form class="form" role="form" method="POST" action="{{ url('/profile/'. $profile->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}

                            <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>
                    </div>
                </td>

            </tr>

        </table>


    </div>

@endsection
@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection