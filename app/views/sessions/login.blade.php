@extends('layouts.login')

@section('content')
		
	<form action="{{ URL::route('store') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
	

	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-10">
	      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox" name="remember"> Remember me
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Sign in</button>
			{{ Form::token() }}
	    </div>
	  </div>
	</form>

@stop