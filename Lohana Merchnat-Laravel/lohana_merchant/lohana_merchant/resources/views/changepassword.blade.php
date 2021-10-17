@extends('app')

@section('title', 'Change Password')

@section('content')

<div class="panel panel-default">
    <div id="agileits-sign-in-page" class="sign-in-wrapper">
        <div class="agileinfo_signin">
            <h3>Change password</h3>

            <div class="panel-body">
                <!-- Display Error Msg -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Change Password Form -->
                <form class="form-horizontal" method="POST" action="{{ url('update_password') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="current-password" type="password" class="form-control" placeholder="Enter Your Current Password" name="current-password" required>

                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="new-password" type="password" class="form-control" name="new-password" placeholder="Enter your New Password" required>

                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-12">
                            <input id="new-password-confirm" type="password" class="form-control" placeholder="Enter Confirm New Password" name="new-password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                    
                            <input type="submit" class="btn btn-primary" value="Change Password">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection