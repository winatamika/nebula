@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- FORM -->
		<h2>Create Earlybird</h2>
		<form action="{{ URL::route('earlybird-post') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Room Type</label>
		    <div class="col-sm-10">
		      <select class="form-control" name="room">
		      	<option value="">Select Room</option>
		      @foreach ($rooms as $room)
		      	 <option value="{{ $room->id }}">{{ $room->name_room }}</option>
			  @endforeach
		      </select>
		      @if($errors->has('room'))
					{{ $errors->first('room') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Checkin Start</label>
		    <div class="col-sm-10">
		      <input type="text" name="start" class="form-control" id="start"  readonly="true"{{ (Input::old('start'))? ' value="' . Input::old('start') . '"' : '' }}>
		      @if($errors->has('start'))
					{{ $errors->first('start') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Checkin Finish</label>
		    <div class="col-sm-10">
		      <input type="text" name="finish" class="form-control" id="finish"  readonly="true"{{ (Input::old('finish'))? ' value="' . Input::old('finish') . '"' : '' }}>
		      @if($errors->has('finish'))
					{{ $errors->first('finish') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Minimum Stay</label>
		    <div class="col-sm-10">
		      <input type="text" name="min" class="form-control" id="inputEmail3"{{ (Input::old('email'))? ' value="' . Input::old('email') . '"' : '' }}>
		      @if($errors->has('min'))
					{{ $errors->first('min') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Earlybird Days</label>
		    <div class="col-sm-10">
		      <input type="text" name="days" class="form-control" id="inputEmail3">
		      @if($errors->has('days'))
					{{ $errors->first('days') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Discount</label>
		    <div class="col-sm-9">
		      <input type="text" name="discount" class="form-control" id="inputEmail3">
		      @if($errors->has('discount'))
					{{ $errors->first('discount') }}
				@endif
		    </div>
		    <div class="col-sm-1">%</div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Create</button>
				{{ Form::token() }}
				<a href="{{ URL::Route('earlybird'); }}" class="btn btn-default">Cancel</a>
		    </div>
		  </div>
		</form>

	</div> <!-- main-content -->

	<script>
		$(function() {
		$( "#start" ).datepicker(
			{
			dateFormat: 'yy-mm-dd',
			numberOfMonths: 2,
			minDate: 0 ,
			 onSelect: function(selected) {
		           $("#finish").datepicker("option","minDate", selected)
		        }
			}
			);
		$("#finish").datepicker(
			{
				dateFormat: 'yy-mm-dd',
				numberOfMonths: 2,
				 minDate: 0 ,
				 onSelect: function(selected) {
		           $("#start").datepicker("option","maxDate", selected)
		        }
				}
			);
		});
	</script>

@stop