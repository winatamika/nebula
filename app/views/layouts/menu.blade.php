
<div class="main-menu">
	<ul class="nav nav-pills">
		
		<li class="dropdown">
 			<a class="dropdown-toggle" data-toggle="dropdown" href="">
		      Menu<span class="caret"></span>
		    </a>
		     <ul class="dropdown-menu" role="menu">
			<li><a href="{{ URL::route('admin') }}">Home</a></li>
			<li> <a href="{{ URL::route('booking-list')}}">Booking-list</a></li>
			 </ul>
		</li>
		<li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="">
		      Room Manager<span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu" role="menu">
		      <li><a href="{{URL::action('RoomController@index')}}">Room</a></li>
		      <li><a href="{{ URL::route('priceplan')}}">PricePlan</a></li>
			   <li><a href="{{ URL::route('earlybird') }}">Earlybird Manager</a></li>
	          <li><a href="{{ URL::route('lastminute') }}">Lastminute Manager</a></li>
	          <li><a href="{{ URL::route('promo') }}">Promo Manager</a></li>
		      <li><a href="#">Submenu</a></li>
		    </ul>
	  </li>

		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Booking Manager <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<!-- <li><a href="">View Booking List</a></li> -->
				<li><a href="{{ URL::route('customer') }}">Customer List</a></li>
				<!-- <li><a href="{{ URL::route('calendar') }}">Calendar View</a></li> -->
				<!-- <li><a href="">Room Blocking</a></li> -->
			</ul>
		</li>

		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Account <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				@if(Auth::user()->level==1)
					<li><a href="{{ URL::route('account') }}">Modify Account</a></li>
				@endif
				<li><a href="{{ URL::route('account-change-password') }}">Change Password</a></li>
			</ul>
		</li>

		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Setting <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="{{ URL::route('profile') }}">Hotel Details</a></li>
				<li><a href="{{ URL::route('payment-gateway') }}">Payment Gateway</a></li>
				<li><a href="{{ URL::route('configure') }}">Configure</a></li>				
				<li><a href="{{ URL::route('email') }}">Email Contents</a></li>
			</ul>
		</li>

		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Fitur <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="{{ URL::route('newsletter') }}">News Letter</a></li>
				<li><a href="{{ URL::route('themes') }}">Themes</a></li>
			</ul>
		</li>		

		<li><a href="{{ URL::route('logout') }}">Logout</a></li>
	</ul>
</div> <!-- menu