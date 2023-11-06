@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- FORM -->
		<h2>Update Promo</h2>
		<form action="{{ URL::route('promo-update') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Promo Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" value="{{ $promo->promo_name }}" id="inputEmail3"{{ (Input::old('name'))? ' value="' . Input::old('name') . '"' : '' }}>
		      @if($errors->has('name'))
					{{ $errors->first('name') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Room Type</label>
		    <div class="col-sm-10">
		    <input type="hidden" name="id" value="{{ $promo->id }}">
		      <select class="form-control" name="room">
		      	<option value="">Select Room</option>
		      @foreach ($rooms as $room)
		      	@if($room->id==$promo->roomtype_id)
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
		      <input type="text" name="start" class="form-control" id="start" value="{{ $promo->checkin_start }}"  readonly="true"{{ (Input::old('start'))? ' value="' . Input::old('start') . '"' : '' }}>
		      @if($errors->has('start'))
					{{ $errors->first('start') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Checkin Finish</label>
		    <div class="col-sm-10">
		      <input type="text" name="finish" class="form-control" id="finish" value="{{ $promo->checkin_finish }}"  readonly="true"{{ (Input::old('finish'))? ' value="' . Input::old('finish') . '"' : '' }}>
		      @if($errors->has('finish'))
					{{ $errors->first('finish') }}
				@endif
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Total</label>
		    <div class="col-sm-10">
		      <input type="text" name="total" class="form-control" value="{{ $promo->total_price }}" id="inputEmail3">
		      @if($errors->has('total'))
					{{ $errors->first('total') }}
				@endif
		    </div>
		  </div>
		 <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
		    <div class="col-sm-10">
		     <textarea class="form-control" name="description" id="ckeditor" rows="3">{{ $promo->description }}</textarea>
		      @if($errors->has('description'))
					{{ $errors->first('description') }}
				@endif
		    </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Update</button>
				{{ Form::token() }}
				<a href="{{ URL::Route('promo'); }}" class="btn btn-default">Cancel</a>
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