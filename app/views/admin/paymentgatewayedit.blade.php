@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		<!-- FORM -->
		<h2>Edit Payment</h2>		
		<form action="{{ URL::Route('payment-edit-post') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Gateway</label>
		    <div class="col-sm-10">
		    <input type="hidden" name="id" value="{{ $payment->id }}">
		      <input type="text" name="gateway" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $payment->gateway_name }}">
				@if($errors->has('gateway'))
					{{ $errors->first('gateway') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Account Info</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" name="account" id="ckeditor" rows="3">{{ $payment->account }}</textarea>
		      @if($errors->has('account'))
					{{ $errors->first('account') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Enabled</label>
		    <div class="col-sm-10">
		     @if($payment->enabled==1)
		      <input type="checkbox" name="enabled" value="1" checked> Hilangkan Centang untuk menonaktifkan
		     @else
				<input type="checkbox" name="enabled" value="1"> Centang untuk mengaktifkan
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