@extends('layouts.theme.using')

@section('content')
<script>
$(document).ready(function(){

  $('#first_name').val('testing');

  $('#btn_exisitng_cust').click(function() {
 
    $('#exist_wait').html("<img src='img/ajax-loader.gif' border='0'>")
    var querystr = 'existing_email='+$('#email_addr_existing').val(); 
         $.ajax({
        url: "getcust",
        data: "existing_email=" + querystr,
        dataType : "json",
        success: function(data){
        if(data.errorcode == 0){
        $('#title').html(data.title)
        $('#fname').val(data.first_name)
        $('#lname').val(data.last_name)
        $('#str_addr').val(data.street_addr)
        $('#city').val(data.city)
         $('#province').val(data.province)
        $('#state').val(data.province)
        $('#zipcode').val(data.zip)
        $('#country').val(data.country)
        $('#phone').val(data.phone)
        $('#fax').val(data.fax)
        $('#email').val(data.email)
        $('#exist_wait').html("")
      }else { 
        alert(data.strmsg);
        $('#fname').val('')
        $('#lname').val('')
        $('#str_addr').val('')
        $('#city').val('')
         $('#province').val(data.province)
        $('#state').val('')
        $('#zipcode').val('')
        $('#country').val('')
        $('#phone').val('')
        $('#fax').val('')
        $('#email').val('')
        $('#exist_wait').html("")
      } 
        }
    });
  });
  });
</script>
	<div class="main-content">
    <h2>Booking Details</h2>   
    <table class="table table-striped table-bordered">
    	<tr>
    		<td colspan="4"><center><b>Your Booking Details</b></center></td>
    	</tr>
    	<tr>
    		<td><b>Checkin Date</b></td>
    		<td><b>Checkout Date</b></td>
    		<td><b>Total Night</b></td>
    		<td><b>Total Room</b></td>

    	</tr>
    	<tr>
    		<td><?=$_SESSION['sv_checkindate'] ?></td>
    		<td><?=$_SESSION['sv_checkoutdate']  ?></td>
    		<td><?=$_SESSION['sv_nightcount'] ?></td>
    		<td>{{$totalroom}}</td>
    	</tr>
    	 <tr>
    		<td><b>Number of Room</b></td>
    		<td><b>Room Type</b></td>
    		<td><b>Adult Occupancy</b></td>
    		<td><b>Gross Total</b></td>
    	</tr>
    	
         <?php $i=0; ?>
              @foreach ($roomsList as $room)
                <tr>
    		<td><?php echo $no_of_room[$i];?></td>
    		<td>{{ $room->name_room }}</td>
    		<td>{{ $room->adult_capacity }}</td>
    		<td><?php echo $currency_symbol.number_format($totalgross[$i], 2 , '.', ',') ?></td>
             <?php $i++; ?>
             </tr>
              @endforeach
        
    	
        <tr>
            <td colspan="3" align="right"><b>Subtotal</b></td>
            <td><b>{{$currency_symbol.number_format($totalprice, 2 , '.', ',')}}</b></td>
        </tr>
    	<tr>
    		<td colspan="3" align="right"><b>Grand Total (include tax)</b></td>
    		<td><b>{{$currency_symbol.number_format($totalprice, 2 , '.', ',')}}</b></td>
    	</tr>

    </table>


    <h2>Existing Customer ?</h2>
   
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Emailn Address</label>
            <div class="col-sm-10">
                <input type="email" name="emailFetch" class="form-control" id="email_addr_existing" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="btn_exisitng_cust" class="btn btn-default">Fetch Details</button>
              
            </div>
        </div>


          <div id="exist_wait"></div>
      
      </table>
    

    <div id="show">
      
    </div>

        <h2>Customer Details</h2>      
        <form action="{{ URL::Route('booking-save') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10" id="title" class="textbox3">
             <select class="form-control" name="title" >
              <option value="Mr">Mr.</option>
              <option value="Mrs">Mrs.</option>
              <option value="Ms">Ms.</option>
              <option value="Dr">Dr.</option>
              <option value="Miss">Miss.</option>
              <option value="Prof">Prof.</option>
             </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
             <input type="text" name="email_name" class="form-control" id="email" placeholder="Email Name" value="">
        
            </div>
          </div>
          <?php $i=0; ?>
              @foreach ($roomsList as $room)
        <input type="hidden" name="count_id[]" value="{{$no_of_room[$i]}}">
        <input type="hidden" name="room_id[]" value="{{$room->id}}">
        <input type="hidden" name="priceking[]" value="<?php echo $totalgross[$i]; ?>">
             <?php $i++; ?>
         @endforeach
        <input type="hidden" name="totalprice" value="{{$totalprice}}">  

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name" value="">
            
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name" value="">
          
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input type="text" name="address" class="form-control" id="str_addr" placeholder="Address" value="">
            
            </div>
          </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">City</label>
            <div class="col-sm-10">
              <input type="text" name="city" class="form-control" id="city" placeholder="City" value="">
          
            </div>
          </div>
             <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Province</label>
            <div class="col-sm-10">
              <input type="text" name="province" class="form-control" id="province" placeholder="province" value="">
          
            </div>
          </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">State</label>
            <div class="col-sm-10">
              <input type="text" name="state" class="form-control" id="state" placeholder="State" value="">
          
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
              <input type="text" name="country" class="form-control" id="country" placeholder="Country" value="">
          
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Zip / Post Code</label>
            <div class="col-sm-10">
              <input type="text" name="zip" class="form-control" id="zipcode" placeholder="Zip" value="">
            
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="">
          
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Fax</label>
            <div class="col-sm-10">
              <input type="text" name="fax" class="form-control" id="fax" placeholder="Fax" value="">
            
            </div>
          </div>

                <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Payment Gateway</label>
            <div class="col-sm-10">
                   @foreach ($payment_gateway as $gateway)
             <input type="radio" name="gateway[]" value="{{ $gateway->gateway_name}}">{{ $gateway->gateway_name}}<br>
             @endforeach
            </div>
          </div>

             <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Any additional requests :</label>
            <div class="col-sm-10">
              <textarea name="request" class="form-control" id="inputEmail3" placeholder="request" value="">
            </textarea>
            </div>
          </div>



          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Confirm And Checkout</button>
                {{ Form::token() }}
            </div>
          </div>
        </form>

    </div>

    <script type="text/javascript">
    $(document).ready(function(){

      $("#submitfetch").submit(function(){

        // fomrData
        var formFetch = new FormFetch();

        $.ajax({
            url: 'booking-fetch',
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            success:function(data){},
            error:function(){}
        });
      });

    });
    </script>

@stop