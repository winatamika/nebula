@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- FORM -->
		<h2>Hotel Details</h2>		
		<form action="{{ URL::Route('profile-save') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Hotel Name</label>
		    <div class="col-sm-10">
		     <input type="text" name="hotel_name" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_name']; }}">
				@if($errors->has('hotel_name'))
					{{ $errors->first('hotel_name') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Street Address</label>
		    <div class="col-sm-10">
		      <input type="text" name="address" class="form-control" id="inputEmail3" placeholder="Last Name" value="{{ $a['conf_hotel_streetaddr']; }}">
		      @if($errors->has('address'))
					{{ $errors->first('address') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">City</label>
		    <div class="col-sm-10">
		      <input type="text" name="city" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_city']; }}">
		      @if($errors->has('city'))
					{{ $errors->first('city') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">State</label>
		    <div class="col-sm-10">
		      <input type="text" name="state" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_state']; }}">
		      @if($errors->has('state'))
					{{ $errors->first('state') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
		    <div class="col-sm-10">
		      <input type="text" name="country" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_country']; }}">
		      @if($errors->has('country'))
					{{ $errors->first('country') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Zip / Post Code</label>
		    <div class="col-sm-10">
		      <input type="text" name="zip" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_zipcode']; }}">
		      @if($errors->has('zip'))
					{{ $errors->first('zip') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
		    <div class="col-sm-10">
		      <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_phone']; }}">
		      @if($errors->has('phone'))
					{{ $errors->first('phone') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Fax</label>
		    <div class="col-sm-10">
		      <input type="text" name="fax" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_fax']; }}">
		      @if($errors->has('fax'))
					{{ $errors->first('fax') }}
				@endif
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email ID</label>
		    <div class="col-sm-10">
		      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_email']; }}">
		      @if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Update</button>
				{{ Form::token() }}
		    </div>
		  </div>
		</form>

	</div> <!-- main-content -->

@stop