<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nebula</title>
	
	<!-- include css -->
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/bootstrap-theme.css') }}
	{{ HTML::style('css/style.css') }}

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- include js -->
	{{ HTML::script('js/jquery-1.11.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}

</head>
<body>

	<div class="box-login">
		
		@if(Session::get('flash_message'))
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  {{ Session::get('flash_message') }}
			</div>
		@endif
		
		@yield('content')

	</div> <!-- box -->
	
</body>
</html>