@extends('app')

@section('title', 'Home')

@section('content')

<!-- Slider -->
<div class="slider">
    <ul class="rslides" id="slider">
        <li>
            <div class="w3ls-slide-text">
                <h3>Sell or Advertise anything online</h3>
                <a href="categories.html" class="w3layouts-explore-all">Browse all Categories</a>
            </div>
        </li>
        <li>
            <div class="w3ls-slide-text">
                <h3>Find the Best Deals Here</h3>
                <a href="categories.html" class="w3layouts-explore">Explore</a>
            </div>
        </li>
        <li>
            <div class="w3ls-slide-text">
                <h3>Lets build the home of your dreams</h3>
                <a href="real-estate.html" class="w3layouts-explore">Explore</a>
            </div>
        </li>
        <li>
            <div class="w3ls-slide-text">
                <h3>Find your dream ride</h3>
                <a href="bikes.html" class="w3layouts-explore">Explore</a>
            </div>
        </li>
        <li>
            <div class="w3ls-slide-text">
                <h3>The Easiest Way to get a Job</h3>
                <a href="jobs.html" class="w3layouts-explore">Find a Job</a>
            </div>
        </li>
    </ul>
</div>
<!-- //Slider -->

<!-- Browse Categories Start -->
<div class="main-content">
    <div class="w3-categories">
        <h3>Browse Categories</h3>
        <div class="container">
            @foreach($business_category as $post)
            <div class="col-md-3">
                <div class="focus-grid w3layouts-boder1">
                    <a class="btn-8 categories" href="{{ URL::to('categories/'.$post['category_id']) }}" id="{{$post['category_id']}}">
                        <div class="focus-border">
                            <div class="focus-layout">
                                <div class="focus-image"><i class="fa fa-mobile"></i></div>
                                <h4 class="clrchg">{{$post['category_name']}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Browse Categories End -->

    <!-- Advertise Hear Section Start -->                               
    <div class="trending-ads">
        <div class="container">
            <!-- slider -->
            <div class="agile-trend-ads">
                <h2>Advertise Hear</h2>
                <ul id="flexiselDemo3">
                    <li>
                         @foreach($advertisement as $posts)
                         @if($posts['status'] == 1)
                        <div class="col-md-3 biseller-column ads_padd">
                           
                            <img src="{{ url('uploads/AD/').'/'.$posts['business_card']}}" alt="" / style="width: 225px">

                        </div>
                        @endif
                        @endforeach
                        
                    </li>
                </ul>
            </div>   
        </div>
    <!-- //Advertise Hear Section End -->               
    </div>
</div>
      
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
<!-- flexisel-js --> 
<script type="text/javascript">
     $(window).load(function() {
        $("#flexiselDemo3").flexisel({
            visibleItems:1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 5000,            
            pauseOnHover: true,
            infinite:true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                portrait: { 
                    changePoint:480,
                    visibleItems:1
                }, 
                landscape: { 
                    changePoint:640,
                    visibleItems:1
                },
                tablet: { 
                    changePoint:768,
                    visibleItems:1
                }
            }
        });
        
    });
</script>

<!-- Slider-JavaScript -->
@endsection        