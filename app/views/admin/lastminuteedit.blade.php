@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- FORM -->
		<h2>Create lastbird</h2>
		<form action="{{ URL::route('lastminute-update') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Room Type</label>
		    <div class="col-sm-10">
		    <input type="hidden" name="id" value="{{ $last->id }}">
		      <select class="form-control" name="room">
		      	<option value="">Select Room</option>
		      @foreach ($rooms as $room)
		      	@if($room->id==$last->roomtype_id)
		      	 	<option value="{{ $room->id }}" selected="selected">{{ $room->name_room }}</option>
		      	 @else
					<option value="{{ $room->id }}">{{ $room->name_room }}</option>
		      	 @endif
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
		      <input type="text" name="start" class="form-control" id="start" value="{{ $last->checkin_start }}"  readonly="true"{{ (Input::old('start'))? ' value="' . Input::old('start') . '"' : '' }}>
		      @if($errors->has('start'))
					{{ $errors->first('start') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Checkin Finish</label>
		    <div class="col-sm-10">
		      <input type="text" name="finish" class="form-control" id="finish" value="{{ $last->checkin_finish }}"  readonly="true"{{ (Input::old('finish'))? ' value="' . Input::old('finish') . '"' : '' }}>
		      @if($errors->has('finish'))
					{{ $errors->first('finish') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Minimum Stay</label>
		    <div class="col-sm-10">
		      <input type="text" name="min" class="form-control" value="{{ $last->minimum_stay }}" id="inputEmail3"{{ (Input::old('email'))? ' value="' . Input::old('email') . '"' : '' }}>
		      @if($errors->has('min'))
					{{ $errors->first('min') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">lastbird Days</label>
		    <div class="col-sm-10">
		      <input type="text" name="days" class="form-control" value="{{ $last->lastminute_days }}" id="inputEmail3">
		      @if($errors->has('days'))
					{{ $errors->first('days') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Discount</label>
		    <div class="col-sm-9">
		      <input type="text" name="discount" class="form-control" value="{{ $last->discount }}" id="inputEmail3">
		      @if($errors->has('discount'))
					{{ $errors->first('discount') }}
				@endif
		    </div>
		    <div class="col-sm-1">%</div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Update</button>
				{{ Form::token() }}
				<a href="{{ URL::Route('lastminute'); }}" class="btn btn-default">Cancel</a>
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