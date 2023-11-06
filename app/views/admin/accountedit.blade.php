@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		<!-- FORM -->
		<h2>Edit Account</h2>		
		<form action="{{ URL::Route('account-edit-post') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
		    <div class="col-sm-10">
		    <input type="hidden" name="id" value="{{ $user->id }}">
		      <input type="text" name="fname" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $user->f_name }}">
				@if($errors->has('fname'))
					{{ $errors->first('fname') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="lname" class="form-control" id="inputEmail3" placeholder="Last Name" value="{{ $user->l_name }}">
		      @if($errors->has('lname'))
					{{ $errors->first('lname') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="disabledInput" type="text" placeholder="{{ $user->username }}" disabled>
		      @if($errors->has('username'))
					{{ $errors->first('username') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ $user->email }}">
		      @if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" id="inputEmail3">
		      <p class="text-primary">kosongkan input password jika tidak ingin merubah password</p>
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
		      	@if($user->level==1)
			      	<option value="1" selected="selected">Administrator</option>
			      	<option value="2">Editor</option>
		      	@else
			      	<option value="1">Administrator</option>
					<option value="2" selected="selected">Editor</option>
				@endif
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
		    <div class="col-sm-10">
		     @if($user->status==1)
		      <input type="checkbox" name="status" value="1" checked> Hilangkan Centang untuk menonaktifkan
		     @else
				<input type="checkbox" name="status" value="1"> Centang untuk mengaktifkan
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