@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Customer List</h2>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>No</th>
		  		<th>Guset Name</th>
		  		<th>Street Address</th>
		  		<th>Phone Number</th>
		  		<th>Email Id</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
			<tr>
				<?php $i=1; ?>
				@foreach ($clients as $client)
					<tr>
						<td>{{ $i }}</td>
						<td>{{ $client->title }}.{{ $client->first_name }} {{ $client->last_name }}</td>
						<td>{{ $client->street_addr }}, {{ $client->city }}, {{ $client->province }} - {{ $client->zip }}</td>
						<td>{{ $client->phone }}</td>
						<td>{{ $client->email }}</td>
						<td><a href="{{ URL::Route('customer-view-booking', array($client->id)) }}">View Bookings</a> | 
						<a href="{{ URL::Route('customer-edit', array($client->id)) }}">Edit</a>
						</td>
					</tr>
				<?php $i=$i+1; ?>
				@endforeach
			</tr>
		  </tbody>
		</table>

	</div> <!-- main-content -->

@stop