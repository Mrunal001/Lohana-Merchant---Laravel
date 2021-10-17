@extends('app')

@section('title', 'View Registered Business')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui1.css') }}">

@endsection

@section('content')	

	<!-- breadcrumbs -->
	<div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs">
			<a href="{{URL::to('home')}}"><i class="fa fa-home home_1"></i></a> / 
			<!-- <a href="categories.html">Categories</a> / --> 
			<span>View Registered Business</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Add Business Form -->
	<div class="container">
		<div class="form-group">
			<div class="col-md-9"></div>
            <div class="col-md-3">
                <a href="{{URL::to('registered_business')}}" class="btn btn-primary add_business_btn">Add Business</a>
            </div>
        </div>
		<div class="ads-grid">
			<div class="agileinfo-ads-display registered_table col-md-12">
				<div class="wrapper">
					<div id="container">
						<ul class="list">
							<?php $id = Auth::id(); ?>
							@foreach($list_reg_business as $post)
							<?php $count = $post->count(); 
							?>
							@if(($post['user_id'] == $id) && ($post['status'] == 1))
								<li>
								<img src="{{ url('uploads/business_card/').'/'.$post['business_card']}}" title="" alt="" />
								<section class="list-left">
								<h5 class="title">Business Title -
								{{$post['business_title']}}
								</h5>
								<span class="business_category">Business Category - {{$post['category_name']}}</span>
								<br>
								<span class="business_category">About Business - {{$post['about_business']}}</span>
								<br>
								<span class="business_category">Business Type - {{$post['business_type']}}</span>
								<br>
								<span class="business_category">Year Of Establishment - {{$post['year_of_establishment']}}</span>
								<br>
								<span class="business_category">Specialist In - {{$post['specialist_in']}}</span>
								<br>
								<span class="business_category">Website - </span><a href="{{$post['website']}}" target="_blank" >{{$post['website']}}</a>

								</section>
								<section class="list-right">
								<span class="date">Contact Person - {{$post['contact_person']}}</span>
								<span class="cityname">Mobile No. - {{$post['mobileno']}}</span>
								<span class="cityname">Email - {{$post['email']}}</span>
								<span class="cityname">Country - {{$post['country_name']}}</span>
								<span class="cityname">State - {{$post['state_name']}}</span>
								<span class="cityname">City - {{$post['city_name']}}</span>
								</section>
								<div class="clearfix"></div>
								</li> 
							
							@endif

							@endforeach	
							@if(($count_status == 0) || ($count == 0 ))

							<div class="no_data_found">No data available in table</div>	
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection