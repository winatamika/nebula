@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content clearfix">
		<!-- FORM -->
		<h2>Customer Edit</h2>		
		<form action="{{ URL::Route('customer-edit-post') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
		    <div class="col-sm-10">
		    <input type="hidden" name="id" value="{{ $client->id }}">
		      <select class="form-control" name="title">
		      	@if($client->title=='Mr')
			      	<option value="Mr" selected="selected">Mr.</option>
			      	<option value="Mrs">Mrs.</option>
			      	<option value="Ms">Ms.</option>
			      	<option value="Dr">Dr.</option>
			      	<option value="Miss">Miss.</option>
			      	<option value="Prof">Prof.</option>
		      	@elseif($client->title=='Mrs')
					<option value="Mr">Mr.</option>
			      	<option value="Mrs" selected="selected">Mrs.</option>
			      	<option value="Ms">Ms.</option>
			      	<option value="Dr">Dr.</option>
			      	<option value="Miss">Miss.</option>
			      	<option value="Prof">Prof.</option>
			     @elseif($client->title=='Ms')
					<option value="Mr">Mr.</option>
			      	<option value="Mrs">Mrs.</option>
			      	<option value="Ms" selected="selected">Ms.</option>
			      	<option value="Dr">Dr.</option>
			      	<option value="Miss">Miss.</option>
			      	<option value="Prof">Prof.</option>
			    @elseif($client->title=='Dr')
					<option value="Mr">Mr.</option>
			      	<option value="Mrs">Mrs.</option>
			      	<option value="Ms">Ms.</option>
			      	<option value="Dr" selected="selected">Dr.</option>
			      	<option value="Miss">Miss.</option>
			      	<option value="Prof">Prof.</option>
				@elseif($client->title=='Miss')
					<option value="Mr">Mr.</option>
			      	<option value="Mrs">Mrs.</option>
			      	<option value="Ms">Ms.</option>
			      	<option value="Dr">Dr.</option>
			      	<option value="Miss" selected="selected">Miss.</option>
			      	<option value="Prof">Prof.</option>
			    @else
			    	<option value="Mr">Mr.</option>
			      	<option value="Mrs">Mrs.</option>
			      	<option value="Ms">Ms.</option>
			      	<option value="Dr">Dr.</option>
			      	<option value="Miss">Miss.</option>
			      	<option value="Prof" selected="selected">Prof.</option>
				@endif
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="fname" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $client->first_name }}">
		      @if($errors->has('fname'))
					{{ $errors->first('fname') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="lname" class="form-control" id="inputEmail3" placeholder="Last Name" value="{{ $client->last_name }}">
		      @if($errors->has('lname'))
					{{ $errors->first('lname') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Street Address</label>
		    <div class="col-sm-10">
		      <input type="text" name="street" class="form-control" id="inputEmail3" placeholder="Street Address" value="{{ $client->street_addr }}">
		      @if($errors->has('street'))
					{{ $errors->first('estreetmail') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">City</label>
		    <div class="col-sm-10">
		      <input type="text" name="city" class="form-control" id="inputEmail3" placeholder="Email" value="{{ $client->city }}">
		      @if($errors->has('city'))
					{{ $errors->first('city') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Province</label>
		    <div class="col-sm-10">
		      <input type="text" name="province" class="form-control" id="inputEmail3" placeholder="Province" value="{{ $client->province }}">
		      @if($errors->has('province'))
					{{ $errors->first('province') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Zip / Post Code</label>
		    <div class="col-sm-10">
		      <input type="text" name="zip" class="form-control" id="inputEmail3" placeholder="Post Code" value="{{ $client->zip }}">
		      @if($errors->has('zip'))
					{{ $errors->first('zip') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
		    <div class="col-sm-10">
		    <input type="text" name="country" class="form-control" id="inputEmail3" placeholder="Country" value="{{ $client->country }}">
		      @if($errors->has('country'))
					{{ $errors->first('country') }}
				@endif
		    </div>
		  </div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
		    <div class="col-sm-10">
		     <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Phone" value="{{ $client->phone }}">
		      @if($errors->has('phone'))
					{{ $errors->first('phone') }}
				@endif
		    </div>
		    </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Fax</label>
		    <div class="col-sm-10">
		     <input type="text" name="fax" class="form-control" id="inputEmail3" placeholder="Fax" value="{{ $client->fax }}">
		      @if($errors->has('fax'))
					{{ $errors->first('fax') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="disabledInput" type="email" placeholder="{{ $client->email }}" disabled>
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