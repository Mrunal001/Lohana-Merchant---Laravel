@extends('admin.adminlayout')

@section('title', 'Dashboard')

@section('content')	

<div class="container">
	<div class="row">  
        <!--Total Registered Business Column-->         
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center admin_box">
                    <h4 class="font-light text-white"><i class="nav-icon fas fa-edit"></i></h4>
                   	@foreach($reg_business as $post)
                  	<?php $count = $post->count(); ?>
  					@endforeach
  					<h1 class="text-white">{{ $count }}</h1>
                    <h6 class="text-white">Total Registered Business</h6>
                </div>
            </div>
        </div>
        <!--Total Advertisement Column--> 
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center admin_box">
                    <h4 class="font-light text-white"><i class="nav-icon fas fa-tools"></i></h4>
                   	@foreach($advertisement as $post)
                  	<?php $count = $post->count(); ?>
  					@endforeach
  					<h1 class="text-white">{{ $count }}</h1>
                   <h6 class="text-white">Total Advertisement</h6>
                </div>
            </div>
        </div>
        <!--Total Registered User Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center admin_box">
                    <h4 class="font-light text-white"><i class="nav-icon fas fa-user"></i></h4>
                   	@foreach($reg_user as $post)
                  	<?php $count = $post->count(); ?>
                	@endforeach
                	<h1 class="text-white">{{ $count }}</h1>
                    <h6 class="text-white">Total Registered User</h6>
                </div>
            </div>
        </div>       
    </div>

    <div class="row">  
        <!--Total Business Category Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center admin_box">
                    <h4 class="font-light text-white"><i class="nav-icon fas fa-user"></i></h4>
                    @foreach($business_category as $post)
                    <?php $count = $post->count(); ?>
                    @endforeach
                    <h1 class="text-white">{{ $count }}</h1>
                    <h6 class="text-white">Total Business Category</h6>
                </div>
            </div>
        </div>   
        <!--Total Country Column-->         
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center admin_box">
                    <h4 class="font-light text-white"><i class="nav-icon fas fa-edit"></i></h4>
                    @foreach($country as $post)
                    <?php $count = $post->count(); ?>
                    @endforeach
                    <h1 class="text-white">{{ $count }}</h1>
                    <h6 class="text-white">Total Country</h6>
                </div>
            </div>
        </div>
        <!--Total State Column--> 
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center admin_box">
                    <h4 class="font-light text-white"><i class="nav-icon fas fa-tools"></i></h4>
                    @foreach($state as $post)
                    <?php $count = $post->count(); ?>
                    @endforeach
                    <h1 class="text-white">{{ $count }}</h1>
                   <h6 class="text-white">Total State</h6>
                </div>
            </div>
        </div>
            
    </div>
</div>

@endsection		                