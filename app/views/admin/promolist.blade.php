@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Promo List</h2>
		<!-- BUTTON -->
		
		<a href="{{ URL::Route('promo-create') }}" class="btn btn-default">Add Promo</a>
		<br>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>No</th>
		  		<th>Room Type</th>
		  		<th>Checkin Start</th>
		  		<th>Checkin Finish</th>
		  		<th>Total Price</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
		 	<?php $i=1; ?>
		  	@foreach ($promos as $promo)
			  	<tr>
			  		<td>{{ $i }}</td>
			  		@foreach ($rooms as $room)
						@if($room->id==$promo->roomtype_id)
				  			<td>{{ $room->name_room }}</td>
						@endif
					@endforeach
			  		<td>{{ $promo->checkin_start }}</td>
			  		<td>{{ $promo->checkin_finish }}</td>
			  		<td>{{ $promo->total_price }}</td>
			  		
			  		<td><a href="{{ URL::Route('promo-edit', array($promo->id)) }}">Edit</a> | 
			  		
			  		{{ Form::open(array('url' => 'promo/del', 'style'=>'display:inline;')) }}
			  		{{ Form::hidden('id', $promo->id) }}
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