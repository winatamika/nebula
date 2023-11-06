@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Early Bird List</h2>
		<!-- BUTTON -->
		
		<a href="{{ URL::Route('lastminute-create') }}" class="btn btn-default">Add Last Minute Promo</a>
		<br>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>No</th>
		  		<th>Room Type</th>
		  		<th>Checkin Start</th>
		  		<th>Checkin Finish</th>
		  		<th>Minimum Stay</th>
		  		<th>Lastminute Days</th>
		  		<th>Discount</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
		 	<?php $i=1; ?>
		  	@foreach ($lasts as $last)
			  	<tr>
			  		<td>{{ $i }}</td>
			  		@foreach ($rooms as $room)
						@if($room->id==$last->roomtype_id)
				  			<td>{{ $room->name_room }}</td>
						@endif
					@endforeach
			  		<td>{{ $last->checkin_start }}</td>
			  		<td>{{ $last->checkin_finish }}</td>
			  		<td>{{ $last->minimum_stay }}</td>
			  		<td>{{ $last->lastminute_days }}</td>
			  		<td>{{ $last->discount }}</td>
			  		
			  		<td><a href="{{ URL::Route('lastminute-edit', array($last->id)) }}">Edit</a> | 
			  		
			  		{{ Form::open(array('url' => 'lastminute/del', 'style'=>'display:inline;')) }}
			  		{{ Form::hidden('id', $last->id) }}
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