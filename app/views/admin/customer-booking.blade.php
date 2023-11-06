@extends('layouts.admin')

@section('content') 
<!-- CONTENT -->
<div class="main-content">
		<!-- Table -->
		<h2>Customer Booking List</h2>

		<table class="table table-hover table-bordered">
				  <thead>
		  	<tr>
		  	
		  		<th>Booking Id</th>
		  		<th>Customer name</th>
		  		<th>Booking Date</th>
		  		<th>Check In Date</th>
		  		<th>Check Out Date</th>
		  		<th>Amount</th>
		  		<th>Detail</th>
		  		<th>Status</th>
		  	</tr>
		  </thead>

		   <tbody>
			<tr>
<?php 
foreach ($memberName as $data){
	$first_name = $data->first_name;
	$last_name = $data->last_name;
	$title = $data->title;
	$nama = $title ." ". $first_name ." ". $last_name;
}

?>

				<?php $i=1; ?>
				@foreach ($listBookings as $listBooking)
				<?php
				$today = date("Y-m-d");
				$start_date = $listBooking->start_date;
				$end_date = $listBooking->end_date;
?>
			
					<tr>
		
						<td>{{ $listBooking->booking_id }}</td>
						<td>{{$nama}}</td>
						<td>{{ $listBooking->booking_time }}</td>
						<td>{{ $listBooking->start_date }}</td>
						<td>{{ $listBooking->end_date }}</td>
						<td>{{$listBooking->payment_ammount }}</td>
						<td><a href="{{ URL::Route('customer-detail-booking', array($listBooking->booking_id)) }}">Detail</a></td>
						<td>

	 					@if (($listBooking->payment_success > 0 ) && (($today < $start_date) || ($today < $end_date ))  )
							
								<font color="#00CC00"><b>Active</b></font> <a href="{{ URL::Route('customer-cancel-booking', array($listBooking->booking_id)) }}">Cancel</a>
						
							@else 
								<font color="#0033FF"><b>Complete</b></font> <a href="{{ URL::Route('customer-delete-booking', array($listBooking->booking_id)) }}">Delete Forever</a>
						
						@endif
						</td>


				
					</tr>
				<?php $i=$i+1; ?>
				@endforeach
			</tr>
		  </tbody>
		</table>

	</div><!-- main-content -->

@stop