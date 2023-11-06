<!doctype html>
<html>
<head>
    <title>ROOM MANAGER</title>
    <meta charset="utf-8">
   <link rel="stylesheet" href="{{URL::asset('bootstrap-combined.min.css')}}" />
   <script type="text/javascript" src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
   <style>
        table form { margin-bottom: 0; }
        form ul { margin-left: 0; list-style: none; }
        .error { color: red; font-style: italic; }
        body { padding-top: 20px; }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<link rel="stylesheet" href="redactor-js-master/redactor/redactor.css" />
<script src="redactor-js-master/redactor/redactor.js"></script>
        <script type="text/javascript">
        $(function()
{
$('#mytext').redactor();
});
         </script>
</head>
<body>
<div class="container">
    @if (Session::has('message'))
    <div class="flash alert">
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif

    @yield('main')
</div>
</body>
</html>