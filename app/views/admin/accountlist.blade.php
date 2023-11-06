@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>Account List</h2>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>No</th>
		  		<th>Username</th>
		  		<th>Name</th>
		  		<th>Email</th>
		  		<th>Level</th>
		  		<th>Status</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
		 	<?php $i=1; ?>
		  	@foreach ($users as $user)
			  	<tr>
			  		<td>{{ $i }}</td>
			  		<td>{{ $user->username }}</td>
			  		<td>{{ $user->f_name }} {{ $user->l_name }}</td>
			  		<td>{{ $user->email }}</td>
			  		<td>
			  			@if($user->level==1)
			  				Administrator
			  			@else
			  				Editor
			  			@endif
			  		</td>
			  		<td>
			  			@if($user->status)
							Aktif
			  			@else
							Not Active
			  			@endif
			  		</td>
			  		<td><a href="{{ URL::Route('account-edit', array($user->id)) }}">Edit</a> | 
			  		<!-- <a href="{{ URL::Route('account-del', array($user->id)) }}">Delete</a> -->
			  		{{ Form::open(array('url' => 'account/del', 'style'=>'display:inline;')) }}
			  		{{ Form::hidden('id', $user->id) }}
			  		{{ Form::submit('Delete') }}
			  		{{ Form::close() }}
			  		</td>
			  	</tr>
				<?php $i=$i+1; ?>
		  	@endforeach
		  </tbody>
		</table>

		<!-- BUTTON -->
		<p>Add Acount Here!</p>
		<a href="{{ URL::Route('create') }}" class="btn btn-default">Add Account</a>

	</div> <!-- main-content -->

@stop