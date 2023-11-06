@extends('layouts.admin')

@section('content')
<!-- CONTENT -->
<div class="main-content">
		<!-- Table -->
		<h2>Customer Booking List</h2>

		<table class="table table-hover table-bordered">


		   <tbody>
			<tr>

				<?php $i=1; ?>
				@foreach ($listDetails as $listDetail)
			
					<tr>
		
						<td>{{ $listDetail->invoice }}</td>
			
				
					</tr>
				<?php $i=$i+1; ?>
				@endforeach
			</tr>
		  </tbody>
		</table>

	</div><!-- main-content -->

@stop