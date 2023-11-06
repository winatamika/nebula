@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<!-- Table -->
		<h2>TABLE</h2>
		<table class="table table-hover table-bordered">
		  <thead>
		  	<tr>
		  		<th>Judul</th>
		  		<th>Judul</th>
		  	</tr>
		  </thead>
		  <tbody>
		  	<tr>
		  		<td>Tes</td>
		  		<td>Tes</td>
		  	</tr>
		  	<tr>
		  		<td>Tes</td>
		  		<td>Tes</td>
		  	</tr>
		  	<tr>
		  		<td>Tes</td>
		  		<td>Tes</td>
		  	</tr>
		  	<tr>
		  		<td>Tes</td>
		  		<td>Tes</td>
		  	</tr>
		  	<tr>
		  		<td>Tes</td>
		  		<td>Tes</td>
		  	</tr>
		  </tbody>
		</table>

		<!-- FORM -->
		<h2>FORM</h2>
		<form role="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">File input</label>
		    <input type="file" id="exampleInputFile">
		    <p class="help-block">Example block-level help text here.</p>
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox"> Check me out
		    </label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

		<!-- BUTTON -->
		<h2>BUTTON</h2>
		<button type="button" class="btn btn-default">Default</button>

		<button type="button" class="btn btn-primary">Primary</button>

		<button type="button" class="btn btn-success">Success</button>

		<button type="button" class="btn btn-info">Info</button>

		<button type="button" class="btn btn-warning">Warning</button>

		<button type="button" class="btn btn-danger">Danger</button>

		<button type="button" class="btn btn-link">Link</button>

		<!-- ALERTS -->
		<h2>ALERTS</h2>
		<div class="alert alert-success" role="alert">Error kepalaku</div>
		<div class="alert alert-info" role="alert">Error kepalaku</div>
		<div class="alert alert-warning" role="alert">Error kepalaku</div>
		<div class="alert alert-danger" role="alert">Error kepalaku</div>

		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Warning!</strong> Better check yourself, you're not looking too good.
		</div>

	</div> <!-- main-content -->

@stop