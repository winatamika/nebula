<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nebula</title>
	
	<!-- include css -->
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/bootstrap-theme.css') }}
	{{ HTML::style('css/style.css') }}	 
	{{ HTML::style('bootstrap-progressbar/css/bootstrap-progressbar-3.3.0.css') }}

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- include js -->
	{{ HTML::script('js/jquery-1.11.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('ckeditor/ckeditor.js') }}
	{{ HTML::script('js/jquery.min.js')}} 

	{{ HTML::script('js/jquery-1.4.js')}}


 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
 <script>
$(function() {
$( "#checkin" ).datepicker({dateFormat: 'yy-mm-dd'});
$("#checkout").datepicker({dateFormat: 'yy-mm-dd'});
});


</script>
</head>
<body>

	<div class="container">
		
		@if(Session::get('flash_message'))
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  {{ Session::get('flash_message') }}
			</div>
		@endif

		@include('layouts.menu')
		
		@yield('content')

	</div> <!-- container -->

	<script>
		$('#custome').hide();

		$( "#themes" ).change(function() {
			
			if($('#themes').val() == '2') {
	            $('#custome').show('slow');
	            $('#default').hide('slow'); 
	        } else {
	            $('#custome').hide('slow'); 
	            $('#default').show('slow'); 
	        } 
		});

		CKEDITOR.replace('ckeditor');
	</script>
	
</body>
</html>