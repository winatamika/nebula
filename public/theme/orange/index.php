<?php
//	$theme = DB::table('themes')->where('id', 1)->first();
//
//	if($theme->theme==1){
//		echo $theme->default;
//	}else{
//		echo $theme->custome;
//	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nebula</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- include css -->
	{{ HTML::style('theme/orange/css/style.css') }}	
	
	<!-- include js -->
	{{ HTML::script('theme/orange/js/bootstrap.min.js') }}
	{{ HTML::script('theme/orange/ckeditor/ckeditor.js') }}
	{{ HTML::script('theme/orange/js/jquery.min.js')}} 
	{{ HTML::script('theme/orange/js/jquery-1.4.js')}}

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


</head>
<body>

	<div class="container">

		
		@yield('content')

	</div> <!-- container -->

	<script>
		CKEDITOR.replace('ckeditor');
	</script>
	
</body>
</html>