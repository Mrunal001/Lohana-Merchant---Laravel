@extends('app')

@section('title', 'Sign Up')

@section('css')
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
@endsection

@section('content')

<div class="panel panel-default">
    <div id="agileits-sign-in-page" class="sign-in-wrapper">
        <div class="agileinfo_signin">
            <h3>Register</h3>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Your Full Name" required autofocus>

                            @if ($errors->has('fullname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="datepicker" type="text" class="form-control" name="birthdate" value="{{ old('birthdate') }}" placeholder="Your Birth Date" required autofocus autocomplete="off">

                            @if ($errors->has('birthdate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birthdate') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('mobileno') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="mobileno" type="text" class="form-control" name="mobileno" value="{{ old('mobileno') }}" placeholder="Your Mobile Number" required autofocus>

                            @if ($errors->has('mobileno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobileno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <select name="gender" class="form-control" id="gender" required="">
                            <option value="" selected="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            
                            </select>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email Address" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                           <select class="form-control country" name="country" required="">
                              <option selected="" value="">Select Country</option>
                              @foreach($country as $key => $post)
                              <option value="{{ $key }}">{{ $post }}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <select name="state" id="state" class="form-control state" required="">
                                <option value="">Select State</option>
                            </select>

                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <select name="city" id="city" class="form-control city" required="">
                                <option value="">Select City</option>
                            </select>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
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
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Enter Confirm Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        
@endsection

@section('script')
<!-- Datepicker js -->
<script type="text/javascript" src="{{ asset('js/jquery-1.12.4.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

  <script type="text/javascript">
    $('.country').change(function(){
    var country_id = $(this).val();    
    if(country_id){
        $.ajax({
           type:"POST",
           url:"{{url('api/get-state-list')}}",
           data : {id:country_id, _token: '{{csrf_token()}}'},
            
           success:function(res){               
            if(res){
                $(".state").empty();
                $(".city").empty();
                $(".state").append('<option value=" ">Select State</option>');
                $(".city").append('<option value=" ">Select City</option>');
                $.each(res,function(key,value){
                    $(".state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $(".state").empty();
            }
           }
        });
    }else{
        $(".state").empty();
        $(".city").empty();
    }      
   });
    $('.state').on('change',function(){
    var state_id = $(this).val();    
    if(state_id){
        $.ajax({
           type:"POST",
           url:"{{url('api/get-city-list')}}",
           data : {id:state_id, _token: '{{csrf_token()}}'},
           success:function(res){               
            if(res){
                $(".city").empty();
                $(".city").append('<option value=" ">Select City</option>');
                $.each(res,function(key,value){
                    $(".city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $(".city").empty();
            }
           }
        });
    }else{
        $(".city").empty();
    }
        
   });
</script>

@endsection
