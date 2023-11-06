@extends('layouts.admin')

@section('content')
  <!-- CONTENT -->
<script type="text/javascript">
$(document).ready(function(){
  $("#priceid").change(function(){
    var priceid = $("#priceid").val();
    $.ajax({
        url: "processprice",
        data: "priceid=" + priceid,
        success: function(data){
            $("#show").html(data);
            $("#show").fadeIn(1000);
        }
    });
  });
});
</script>

 
  <div class="main-content">

  <select name="priceid" id="priceid">
<option value="select">Select</option>

@foreach($Roomlist as $key=>$value) {
<option value={{$key}}>{{$value}}</option>";
@endforeach

</select> 

<div id ="show"></div>
  </div>
 <!-- main-content -->

@stop