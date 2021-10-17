@extends('app')

@section('title', 'Sign In')

@section('content')
        
<div class="panel panel-default">
    <div id="agileits-sign-in-page" class="sign-in-wrapper">
        <div class="agileinfo_signin">
            <h3>Login</h3>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('mobileno') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="mobileno" type="text" class="form-control" name="mobileno" value="{{ old('mobileno') }}" required autofocus placeholder="Enter Your Mobile Number">

                            @if ($errors->has('mobileno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobileno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Enter Your Password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Login">

                            <a class="btn btn-link forgot_password" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
