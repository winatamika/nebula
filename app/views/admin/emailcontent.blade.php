@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Email Setting</h2>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>No</th>
		  		<th>Type</th>
		  		<th>Subject</th>
		  		<th>Content</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
		 	<?php $i=1; ?>
		  	@foreach ($emails as $email)
			  	<tr>
			  		<td>{{ $i }}</td>
			  		<td>{{ $email->email_name }}</td>
			  		<td>{{ $email->email_subject }}</td>
			  		<td><button class="btn" data-toggle="modal" data-target="#myModal{{$i}}">View</button></td>
			  		<td><a href="{{ URL::Route('email-edit', array($email->id)) }}">Edit</a></td>
			  	</tr>
			  	<!-- Modal -->
				<div class="modal fade" id="myModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title" id="myModalLabel">Content Email</h4>
				      </div>
				      <div class="modal-body">
				        {{ $email->email_html }}
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <a href="{{ URL::Route('email-edit', array($email->id)) }}" class="btn btn-default">Edit</a>
				      </div>
				    </div>
				  </div>
				</div>
				<?php $i=$i+1; ?>
		  	@endforeach
		  </tbody>
		</table>

	</div> <!-- main-content -->

@stop