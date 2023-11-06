@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
		
		<h2>Themes</h2>
		<!-- <form action="{{ URL::Route('theme-change') }}" method="post" role="form" enctype="multipart/form-data"> -->
		{{ Form::open(array('route' => 'theme-change','files'=>true)) }}
			<select class="form-control" id="themes" name="themes">
			  <option value="1">Default</option>
			  <option value="2">Custome</option>
			</select>
			
			<hr>
			
			<div id="default">
				<div class="row">
					<div class="col-sm-12">
						<h4>Klik Update untuk mengembalikan ke theme default</h4>
						<textarea class="form-control disabledInput" name="defaulth" rows="10">
<!-- include css -->
{{ HTML::style('theme/orange/css/style.css') }}	
<!-- include js -->
{{ HTML::script('theme/orange/js/bootstrap.min.js') }}
</head>
<body>
<div class="container">
						</textarea>
					
						<textarea class="form-control disabledInput" name="defaultf" rows="10">

</div> <!-- container -->

						</textarea>
					</div>
				</div> <!-- row -->
			</div> <!-- default -->

			<div id="custome">
				<div class="row">
					<div class="col-sm-12">
					  <div class="form-group">
					    <label for="exampleInputFile">File input</label>
					    <input type="file" id="exampleInputFile" name="uploadtheme">
					    <p class="help-block">Upload your theme (*.zip)</p>
					  </div>
					</div>

					<div class="col-sm-12">
						<h4>Header Theme</h4>
						<textarea class="form-control" name="customeh" rows="10">

<!-- include css -->
{{ HTML::style('theme/black/css/style.css') }}	

<!-- include js -->
{{ HTML::script('theme/black/js/bootstrap.min.js') }}

</head>
<body>
<div class="container">
						</textarea>
						<h4>Footer Theme</h4>
						<textarea class="form-control" name="customef" rows="10">
</div> <!-- container -->
						</textarea>
					</div>
					
				</div>
			</div> <!-- custome -->
			<br>

			 <button type="submit" class="btn btn-default">Update</button>
				{{ Form::token() }}
		<!-- </form> -->

		{{ Form::close() }}

	</div> <!-- main-content -->

@stop