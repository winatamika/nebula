@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Payment Gateway</h2>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>No</th>
		  		<th>Gateway</th>
		  		<th>Account Info</th>
		  		<th>Enabled</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
		 	<?php $i=1; ?>
		  	@foreach ($payment as $payment)
			  	<tr>
			  		<td>{{ $i }}</td>
			  		<td>{{ $payment->gateway_name }}</td>
			  		<td>{{ $payment->account }}</td>
			  		<td>
			  			@if($payment->enabled==1)
			  				Yes
			  			@else
							No
			  			@endif
			  		</td>
			  		<td><a href="{{ URL::Route('payment-edit', array($payment->id)) }}">Edit</a></td>
			  	</tr>
				<?php $i=$i+1; ?>
		  	@endforeach
		  </tbody>
		</table>

		

	</div> <!-- main-content -->

@stop