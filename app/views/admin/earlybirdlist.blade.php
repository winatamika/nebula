@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Early Bird List</h2>
		<!-- BUTTON -->
		<p>Add Early Bird Here!</p>
		<a href="{{ URL::Route('earlybird-create') }}" class="btn btn-default">Add Early Bird Promo</a>
		<br>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>No</th>
		  		<th>Room Type</th>
		  		<th>Checkin Start</th>
		  		<th>Checkin Finish</th>
		  		<th>Minimum Stay</th>
		  		<th>Earlybird Days</th>
		  		<th>Discount</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
		 	<?php $i=1; ?>
		  	@foreach ($earlies as $early)
			  	<tr>
			  		<td>{{ $i }}</td>
			  		@foreach ($rooms as $room)
						@if($room->id==$early->roomtype_id)
				  			<td>{{ $room->name_room }}</td>
						@endif
					@endforeach
			  		<td>{{ $early->checkin_start }}</td>
			  		<td>{{ $early->checkin_finish }}</td>
			  		<td>{{ $early->minimum_stay }}</td>
			  		<td>{{ $early->earlybird_days }}</td>
			  		<td>{{ $early->discount }}</td>
			  		
			  		<td><a href="{{ URL::Route('earlybird-edit', array($early->id)) }}">Edit</a> | 
			  		
			  		{{ Form::open(array('url' => 'earlybird/del', 'style'=>'display:inline;')) }}
			  		{{ Form::hidden('id', $early->id) }}
			  		{{ Form::submit('Delete') }}
			  		{{ Form::close() }}
			  		</td>
			  	</tr>
				<?php $i=$i+1; ?>
		  	@endforeach
		  </tbody>
		</table>

		

	</div> <!-- main-content -->

@stop