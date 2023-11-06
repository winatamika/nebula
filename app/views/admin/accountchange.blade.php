@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- FORM -->
		<h2>Change Password</h2>
		<form action="{{ URL::route('account-change-password-post') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
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
		      <input type="password" name="password-repeat" class="form-control" id="inputEmail3">
		      @if($errors->has('password-repeat'))
					{{ $errors->first('password-repeat') }}
				@endif
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Change</button>
				{{ Form::token() }}
		    </div>
		  </div>
		</form>

	</div> <!-- main-content -->

@stop