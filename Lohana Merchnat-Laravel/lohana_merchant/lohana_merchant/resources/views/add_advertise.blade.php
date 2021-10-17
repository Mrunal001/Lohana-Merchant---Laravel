@extends('app')

@section('title', 'Add Advertisement')

@section('css')
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
@endsection

@section('content')

<div class="panel panel-default">
    <div id="agileits-sign-in-page" class="sign-in-wrapper">
        <!-- Display Error Msg -->
         <div class="show_pending_msg">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::get('success'))
                <div class="alert alert-warning">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
        </div>
        <!-- Add Advertisement Form -->
        <div class="agileinfo_signin">
            <h3>Add Advertisement</h3>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{url('add_advertise')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('business_card') ? ' has-error' : '' }}">

                        <label for="business_card" class="col-md-12 label_business">Add Business Card</label>

                        <div class="col-md-12">
                            <input id="business_card" type="file" class="form-control" name="business_card" value="{{ old('business_card') }}" placeholder="Your Full Name" required autofocus>

                            @if ($errors->has('business_card'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('business_card') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('business_name') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('business_name') }}" placeholder="Enter Your Business name" required autofocus>

                            @if ($errors->has('business_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('business_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <textarea id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Your Address" required autofocus></textarea> 

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group{{ $errors->has('person_name') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="person_name" type="text" class="form-control" name="person_name" value="{{ old('person_name') }}" placeholder="Enter Person Name" required autofocus>

                            @if ($errors->has('person_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('person_name') }}</strong>
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

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Add Advertise">
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
