<div class="agiletopbar">
			<div class="wthreenavigation">
				<div class="menu-wrap">
				<nav class="menu">
					<div class="icon-list">
						<a href="{{URL::to('home')}}" class="{{ Request::path() == 'home' ? 'active' : '' }}"><i class="fa fa-fw fa-mobile"></i><span>Home</span></a>

						<a href="{{URL::to('list_registerd_business')}}" class="{{ Request::path() == 'list_registerd_business' ? 'active' : '' }}"><i class="fa fa-fw fa-laptop"></i><span>Registered Business</span></a>

						<a href="{{URL::to('add_advertise')}}" class="{{ Request::path() == 'add_advertise' ? 'active' : '' }}"><i class="fa fa-fw fa-laptop"></i><span>Add Advertisement</span></a>

						<a href="cars.html"><i class="fa fa-fw fa-car"></i><span>Matrimony Profiles</span></a>

						<a href="bikes.html"><i class="fa fa-fw fa-motorcycle"></i><span>Job Updates</span></a>

						<a href="furnitures.html"><i class="fa fa-fw fa-wheelchair"></i><span>E-Learning</span></a>

						<a href="pets.html"><i class="fa fa-fw fa-paw"></i><span>Information Center</span></a>

						<a href="books-sports-hobbies.html"><i class="fa fa-fw fa-book"></i><span>Privacy Policy</span></a>

						<a href="fashion.html"><i class="fa fa-fw fa-asterisk"></i><span>Contact Us</span></a>
					</div>
				</nav>
				<button class="close-button" id="close-button">Close Menu</button>
			</div>
			<button class="menu-button" id="open-button"> </button>
			</div>
			<div class="clearfix"></div>
		</div>