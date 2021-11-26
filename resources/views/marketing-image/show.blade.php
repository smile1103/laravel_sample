@extends('layouts.master')

@section('title')

    <title>{{ $marketingImage->name }}</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/marketing-image'>Marketing Images</a></li>
        <li><a href='/marketing-image/{{ $marketingImage->id }}'>{{ $marketingImage->image_name }}</a></li>
    </ol>

    <h1>{{ $marketingImage->image_name }} Marketing Image</h1>

    <div class="pull-left">


        <a href="/marketing-image/{{ $marketingImage->id }}/edit">

            <button type="button" class="btn btn-primary btn-lg">Edit Image</button></a>

    </div>
    <br><br>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->
        <table class="table table-striped">

            <tr>

                <th>Thumbnail</th>

            </tr>

            <tr>

                <td>

                    <img src="{{ $marketingImage->showImage($marketingImage, $thumbnailPath) }}">

                </td>

            </tr>

            <tr>

                <th>Active?</th>

            </tr>

            <tr>

                <td>{{ $marketingImage->showActiveStatus($marketingImage->is_active) }}</td>

            </tr>

            <tr>

                <th>Featured?</th>

            </tr>

            <tr>

                <td>{{ $marketingImage->showFeaturedStatus($marketingImage->is_featured) }}</td>

            </tr>

            <tr>

                <th>Image Weight</th>

            </tr>

            <tr>

                <td>{{ $marketingImage->image_weight }}</td>

            </tr>

            <tr>

                <th>Primary Image</th>

            </tr>

            <tr>

                <td>

                    <img src="{{ $marketingImage->showImage($marketingImage, $imagePath) }}" style="max-width: 600px;">

                </td>
            </tr>

            <tr>
                <td>

                    <div class="form-group pull-left">

                        <form class="form" role="form" method="POST" action="{{ url('/marketing-image/'. $marketingImage->id) }}">
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

            if (x){

                return true;

            } else {

                return false;

            }

        }
    </script>
@endsection