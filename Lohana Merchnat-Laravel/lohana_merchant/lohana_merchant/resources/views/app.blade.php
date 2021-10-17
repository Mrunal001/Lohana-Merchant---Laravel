<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    
    @include('head')
    @yield('css')
</head>    
<body>	
		<!-- Navigation -->
		@include('navigation')
		<!-- //Navigation -->
		<!-- header -->
		@include('header')
		<!-- //header -->
	
		<!-- content-starts-here -->
		@yield('content')
		<!--footer section start-->		
		@include('footer')
        <!--footer section end-->
		@include('footer_script')
		@yield('script')
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</body>		
</html>