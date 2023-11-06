@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- FORM -->
		<h2>Create Account</h2>
		<form action="{{ URL::route('create-post') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="fname" class="form-control" id="inputEmail3" placeholder="First Name"{{ (Input::old('fname'))? ' value="' . Input::old('fname') . '"' : '' }}>
				@if($errors->has('fname'))
					{{ $errors->first('fname') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="lname" class="form-control" id="inputEmail3" placeholder="Last Name"{{ (Input::old('lname'))? ' value="' . Input::old('lname') . '"' : '' }}>
		      @if($errors->has('lname'))
					{{ $errors->first('lname') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username"{{ (Input::old('username'))? ' value="' . Input::old('username') . '"' : '' }}>
		      @if($errors->has('username'))
					{{ $errors->first('username') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email"{{ (Input::old('email'))? ' value="' . Input::old('email') . '"' : '' }}>
		      @if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" id="inputEmail3">
		      @if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Password Repeat</label>
		    <div class="col-sm-10">
		      <input type="password" name="passwordr" class="form-control" id="inputEmail3">
		      @if($errors->has('passwordr'))
					{{ $errors->first('passwordr') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
		    <div class="col-sm-10">
		      <select class="form-control" name="level">
		      	 <option value="1">Administrator</option>
				 <option value="2">Editor</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
		    <div class="col-sm-10">
				<input type="checkbox" name="status" value="1"> Centang untuk mengaktifkan
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Create</button>
				{{ Form::token() }}
		    </div>
		  </div>
		</form>

	</div> <!-- main-content -->

@stop