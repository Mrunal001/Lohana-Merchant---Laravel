<header>
	<div class="w3ls-header"><!--header-one--> 
		<div class="w3ls-header-left"></div>
		<div class="w3ls-header-right">
			<ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="fa fa-user" aria-hidden="true"></i>Register</a></li>
                    
                @else
                    <li class="dropdown">
                        <a href="#" class=" display_username dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           Welcome {{ Auth::user()->fullname }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        	<li class="change_password"><a href="{{ url('view_registered_busines') }}">View Registered Business</a></li>

                        	<li class="change_password"><a href="{{ url('change_password') }}">Change Password</a></li>

                            <li>	
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                @endif
            </ul>
		</div>
		
		<div class="clearfix"> </div> 
	</div>
	<div class="container">
		<div class="agile-its-header">
			<div class="logo">
				<h1><a href="{{URL::to('home')}}"><span>Re</span>sale-v2</a></h1>
			</div>
				
			<div class="clearfix"></div>
		</div>
	</div>
</header>