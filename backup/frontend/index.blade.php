@extends('layouts.theme.using')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">
	<!-- FORM -->
		<center>
		<h2>Reservation</h2>
	@foreach ($adultcapacity as $adultcapacityy)
<?php  $adult = $adultcapacityy->a; ?>
   @endforeach
   	@foreach ($childcapacity as $childcapacityy)
<?php $child = $childcapacityy->b  ?>
   @endforeach

		<form role="form" action="{{ URL::route('booking-search') }}" method="post">
		  <div class="form-group">
		    <label>CheckIn Date</label>
		    <input type="text" id="checkin" name="checkin" class="form-control" style="width:100px;" readonly="true" >
		  </div>
		  <div class="form-group">
		    <label>CheckOut Date</label>
		    <input type="text"  id="checkout" name="checkout" class="form-control" style="width:100px;"  readonly="true" >
		  </div>
		  <div class="form-group">
		  	 <label>Adult capacity</label>
		     <select name="adult" id="adult" class="form-control" style="width:100px;">
				<option value="0">Select</option>
				
					@for($i=1;$i<=$adult;$i++)
						<option value="{{ $i }}">{{$i}}</option>";
					@endfor
	
			
				</select> 
		  </div>

		  <div class="form-group">
		  	 <label>Child capacity</label>
		     <select name="child" id="child" class="form-control" style="width:100px;">
				<option value="0">Select</option>
				
					@for($i=1;$i<=$child;$i++)
						 <option value="{{ $i }}">{{$i}}</option>
					@endfor
				</select> 
				
		  </div>
		   <input type="submit" value="submit" class="btn btn-default" onClick="return empty()" />
		</form>
	</center>
</div>

<script>
$(function() {
$( "#checkin" ).datepicker(
	{
	dateFormat: 'yy-mm-dd', 
	minDate: 0 ,
	 onSelect: function(selected) {
           $("#checkout").datepicker("option","minDate", selected)
        }
	}
	);
$("#checkout").datepicker(
	{
		dateFormat: 'yy-mm-dd',
		 minDate: 0 ,
		 onSelect: function(selected) {
           $("#checkin").datepicker("option","maxDate", selected)
        }
		}
	);
});


function empty() {
	var checkin;
	var checkout;
    checkin = document.getElementById("checkin").value;
    checkout = document.getElementById("checkout").value;
    if (checkin == "") {
        alert("Checkin date was empty ! ");
        return false;
    };
    if (checkout == ""){
    	alert("Checkout date was empty !");
    	return false ; 
    }
}
</script>

@stop