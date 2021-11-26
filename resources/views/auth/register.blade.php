@extends('layouts.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Register</li>
    </ol>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div>

                <a href="/auth/facebook">
                    <button type="button"class="btn btn-primary btn-lg btn-block">Facebook Sign In
                    </button>
                </a>

            </div>

            <div>Register in with your Facebook sign in above or use the form below:</div>

            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Subscribe to Newsletter?
                            </label>
                            <div class="col-md-6">
                                <input type="checkbox"  name="is_subscribed">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label{{ $errors->has('terms') ? ' has-error' : '' }}">
                                <a href="/terms-of-service">

                                    Agree To Terms

                                </a></label>

                            <div class="col-md-6">
                                <input type="checkbox"  name="terms" required>
                                @if ($errors->has('terms'))
                                    <span class="help-block"><strong>{{ $errors->first('terms') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
