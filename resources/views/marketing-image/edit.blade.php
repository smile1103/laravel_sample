@extends('layouts.master')

@section('title')

    <title>Edit a Marketing Image</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/marketing-image'>Marketing Images</a></li>
        <li><a href='/marketing-image/{{ $marketingImage->id }}'>{{ $marketingImage->image_name }}</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h2>Update Image</h2>

    <hr/>

    <!-- delete button -->

    <div class="form-group pull-right">

        <form class="form" role="form" method="POST" action="{{ url('/marketing-image/'. $marketingImage->id) }}">
            <input type="hidden" name="_method" value="delete">
            {{ csrf_field() }}

            <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

        </form>
    </div>

    <!-- image name no input -->
    <div>

        <div class="control-label">
            Image Name:

        </div>

        <h4>{{ $marketingImage->image_name
                   . '.' .
                   $marketingImage->image_extension }}
        </h4>

    </div>

    <div class="control-label">Thumbnail:</div>
    <!-- image thumbnail -->
    <div>

        <img src="{{ $marketingImage->showImage($marketingImage, $thumbnailPath) }}">

    </div>

    <br>

    <form class="form" role="form" method="POST"
          action="{{ url('/marketing-image/' . $marketingImage->id) }}"
          enctype="multipart/form-data">

        <input type="hidden" name="_method" value="patch">

    {{ csrf_field() }}

    <!-- is_active Form Input -->

        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">

            <label class="control-label">Is Active</label>


            <select class="form-control" id="is_active" name="is_active">
                <option value="{{$marketingImage->is_active}}">
                    {{ $marketingImage->is_active == 1 ? 'Yes' :'No' }}</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>


            @if ($errors->has('is_active'))

                <span class="help-block">
                <strong>{{ $errors->first('is_active') }}</strong>
                </span>

            @endif

        </div>

        <!-- is_featured Form Input -->

        <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }}">

            <label class="control-label">Is Featured</label>


            <select class="form-control" id="is_featured" name="is_featured">
                <option value="{{$marketingImage->is_featured}}">
                    {{ $marketingImage->is_featured == 1 ? 'Yes' :'No' }}</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>


            @if ($errors->has('is_featured'))

                <span class="help-block">
                <strong>{{ $errors->first('is_featured') }}</strong>
                </span>

            @endif

        </div>

        <!-- image_weight Form Input -->

        <div class="form-group{{ $errors->has('image_weight') ? ' has-error' : '' }}">

            <label class="control-label">Image Weight</label>

            <input type="number" class="form-control" name="image_weight"
            value="{{ old('image_weight') ? old('image_weight') : $marketingImage->image_weight }}">

        @if ($errors->has('image_weight'))

                <span class="help-block">
                <strong>{{ $errors->first('image_weight') }}</strong>
                </span>

            @endif

        </div>

        <!-- image file Form Input -->

        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

            <div class="form-group">
                <label class="control-label">Primary Image
                </label>

                <input type="file" name="image" id="image">
            </div>

            @if ($errors->has('image'))

                <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
                </span>

        @endif

        <!-- Submit Button -->

            <div class="form-group">

                <button type="submit" class="btn btn-primary btn-lg">

                    Update

                </button>

            </div>
        </div>

    </form>

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