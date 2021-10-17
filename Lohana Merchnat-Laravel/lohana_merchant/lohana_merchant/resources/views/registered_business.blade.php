@extends('app')

@section('title', 'Add Business')

@section('css')

<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">

@endsection

@section('content')

<div class="panel panel-default">
    <div id="agileits-sign-in-page" class="sign-in-wrapper">
        <!-- Display error Msg -->
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
        <!-- Add Business Form -->
        <div class="agileinfo_signin">
            <h3>Add Business</h3>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{url('registered_business')}}" enctype="multipart/form-data">
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

                    <div class="form-group{{ $errors->has('business_title') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="business_title" type="text" class="form-control" name="business_title" value="{{ old('business_title') }}" placeholder="Your Business Title" required autofocus>

                            @if ($errors->has('business_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('business_title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="contact_person" type="text" class="form-control" name="contact_person" value="{{ old('contact_person') }}" placeholder="Enter Your Contact Person" required autofocus>

                            @if ($errors->has('contact_person'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_person') }}</strong>
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

                    <div class="form-group{{ $errors->has('business_category') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                           <select class="form-control" name="business_category" required="">
                              <option disabled="" selected="" value="">Select Business Category</option>
                              @foreach($business_category as $key => $post)
                              <option value="{{ $key }}">{{ $post }}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('business_category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('business_category') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('business_type') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                           <select class="form-control" name="business_type" required="">
                              <option disabled="" selected="" value="">Select Business Type</option>
                              <option value="office">Office</option>
                              <option value="shop">Shop</option>
                              <option value="showroom">Showroom</option>
                              <option value="hospital">Hospital</option>
                              <option value="gruh_udhyog">Gruh Udhyog</option>
                            </select>

                            @if ($errors->has('business_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('business_type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('year_of_establishment') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="year_of_establishment" type="text" class="form-control" name="year_of_establishment" value="{{ old('year_of_establishment') }}" placeholder="Year Of Establishment" required autofocus>

                            @if ($errors->has('year_of_establishment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('year_of_establishment') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group{{ $errors->has('specialist_in') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="specialist_in" type="text" class="form-control" name="specialist_in" value="{{ old('specialist_in') }}" placeholder="Specialist In" required autofocus>

                            @if ($errors->has('specialist_in'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('specialist_in') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('about_business') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                           <textarea  id="about_business" type="text" class="form-control" name="about_business" value="{{ old('about_business') }}" placeholder="Write About Your Business" required autofocus></textarea>

                            @if ($errors->has('about_business'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about_business') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}" placeholder="Enter Your Website Url" required autofocus>

                            @if ($errors->has('website'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('website') }}</strong>
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

                    <div class="form-group{{ $errors->has('mode_of_payment[]') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <label for="business_card" class="label_business">Select Mode Of Payment</label><br>

                              <input type="checkbox" id="cash" name="mode_of_payment[]" value="Cash">
                              <label for="cash"> Cash</label>
                              <input type="checkbox" id="cheque" name="mode_of_payment[]" value="Cheque">
                              <label for="cheque"> Cheque</label>
                              <input type="checkbox" id="credit_card" name="mode_of_payment[]" value="Credit/Debit Card">
                              <label for="credit_card">Credit/Debit Card</label><br><br>

                            @if ($errors->has('mode_of_payment[]'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mode_of_payment[]') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Add Business">
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
