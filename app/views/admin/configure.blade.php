@extends('layouts.admin')

@section('content')

	<!-- CONTENT -->
	<div class="main-content">

		<!-- FORM -->
		<h2>Configure</h2>		
		<form action="{{ URL::Route('configure-save') }}" class="form-horizontal has-success has-feedback" role="form" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email Notification</label>
		    <div class="col-sm-10">
		     <input type="email" name="email_notif" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_notification_email']; }}">
				@if($errors->has('email_notif'))
					{{ $errors->first('email_notif') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Mail Server</label>
		    <div class="col-sm-10">
		      <input type="text" name="mail_server" class="form-control" id="inputEmail3" placeholder="Last Name" value="{{ $a['conf_mail_server']; }}">
		      @if($errors->has('mail_server'))
					{{ $errors->first('mail_server') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Mail Username</label>
		    <div class="col-sm-10">
		      <input type="email" name="mail_user" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_mail_username']; }}">
		      @if($errors->has('mail_user'))
					{{ $errors->first('mail_user') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Mail Password</label>
		    <div class="col-sm-10">
		      <input type="text" name="mail_pass" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_mail_password']; }}">
		      @if($errors->has('mail_pass'))
					{{ $errors->first('mail_pass') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Mail Port</label>
		    <div class="col-sm-10">
		      <input type="text" name="mail_port" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_mail_port']; }}">
		      @if($errors->has('mail_port'))
					{{ $errors->first('mail_port') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Currency Code</label>
		    <div class="col-sm-10">
		      <input type="text" name="cur_code" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_currency_code']; }}">
		      @if($errors->has('cur_code'))
					{{ $errors->first('cur_code') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Currency Symbol</label>
		    <div class="col-sm-10">
		      <input type="text" name="cur_symbol" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_currency_symbol']; }}">
		      @if($errors->has('cur_symbol'))
					{{ $errors->first('cur_symbol') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Booking Engine</label>
		    <div class="col-sm-10">
		      <select class="form-control" name="booking_engine">
		      @if($a['conf_booking_turn_off']==1)
			      	<option value="1" selected="selected">Turn On</option>
			      	<option value="0">Turn Off</option>
			   @else
					<option value="1">Turn On</option>
			      	<option value="0" selected="selected">Turn Off</option>
			   @endif
		      	
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Hotel Timezone</label>
		    <div class="col-sm-10">
		      <input type="text" name="timezone" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_hotel_timezone']; }}">
		      @if($errors->has('timezone'))
					{{ $errors->first('timezone') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Minimal Booking</label>
		    <div class="col-sm-10">
		     <select class="form-control" name="min_booking">
		    		<?php for($i=1;$i<=10;$i++){
			      		echo"<option value='".$i."'";
			      		if($a['conf_min_night_booking']==$i) {
			      			echo" selected='selected'";
			      		}else{
			      			echo"";
			      		}
			      		echo">$i</option>";
			      	} ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Date Format</label>
		    <div class="col-sm-10">
		     <select class="form-control" name="date_format">
		     	@if($a['conf_dateformat']=='mm/dd/yy')
			      	<option selected="selected" value="mm/dd/yy">mm/dd/yy</option>
					<option value="dd/mm/yy">dd/mm/yy</option>
					<option value="mm-dd-yy">mm-dd-yy</option>
					<option value="dd-mm-yy">dd-mm-yy</option>
					<option value="mm.dd.yy">mm.dd.yy</option>
					<option value="dd.mm.yy">dd.mm.yy</option>
					<option value="yy-mm-dd">yy-mm-dd</option>
				@elseif($a['conf_dateformat']=='dd/mm/yy')
					<option value="mm/dd/yy">mm/dd/yy</option>
					<option selected="selected" value="dd/mm/yy">dd/mm/yy</option>
					<option value="mm-dd-yy">mm-dd-yy</option>
					<option value="dd-mm-yy">dd-mm-yy</option>
					<option value="mm.dd.yy">mm.dd.yy</option>
					<option value="dd.mm.yy">dd.mm.yy</option>
					<option value="yy-mm-dd">yy-mm-dd</option>
				@elseif($a['conf_dateformat']=='mm-dd-yy')
					option value="mm/dd/yy">mm/dd/yy</option>
					<option value="dd/mm/yy">dd/mm/yy</option>
					<option selected="selected" value="mm-dd-yy">mm-dd-yy</option>
					<option value="dd-mm-yy">dd-mm-yy</option>
					<option value="mm.dd.yy">mm.dd.yy</option>
					<option value="dd.mm.yy">dd.mm.yy</option>
					<option value="yy-mm-dd">yy-mm-dd</option>
				@elseif($a['conf_dateformat']=='dd-mm-yy')
					<option value="mm/dd/yy">mm/dd/yy</option>
					<option value="dd/mm/yy">dd/mm/yy</option>
					<option value="mm-dd-yy">mm-dd-yy</option>
					<option selected="selected" value="dd-mm-yy">dd-mm-yy</option>
					<option value="mm.dd.yy">mm.dd.yy</option>
					<option value="dd.mm.yy">dd.mm.yy</option>
					<option value="yy-mm-dd">yy-mm-dd</option>
				@elseif($a['conf_dateformat']=='mm.dd.yy')
					<option value="mm/dd/yy">mm/dd/yy</option>
					<option value="dd/mm/yy">dd/mm/yy</option>
					<option value="mm-dd-yy">mm-dd-yy</option>
					<option value="dd-mm-yy">dd-mm-yy</option>
					<option selected="selected" value="mm.dd.yy">mm.dd.yy</option>
					<option value="dd.mm.yy">dd.mm.yy</option>
					<option value="yy-mm-dd">yy-mm-dd</option>
				@elseif($a['conf_dateformat']=='dd.mm.yy')
					<option value="mm/dd/yy">mm/dd/yy</option>
					<option value="dd/mm/yy">dd/mm/yy</option>
					<option value="mm-dd-yy">mm-dd-yy</option>
					<option value="dd-mm-yy">dd-mm-yy</option>
					<option value="mm.dd.yy">mm.dd.yy</option>
					<option selected="selected" value="dd.mm.yy">dd.mm.yy</option>
					<option value="yy-mm-dd">yy-mm-dd</option>
				@else
					<option value="mm/dd/yy">mm/dd/yy</option>
					<option value="dd/mm/yy">dd/mm/yy</option>
					<option value="mm-dd-yy">mm-dd-yy</option>
					<option value="dd-mm-yy">dd-mm-yy</option>
					<option value="mm.dd.yy">mm.dd.yy</option>
					<option value="dd.mm.yy">dd.mm.yy</option>
					<option selected="selected" value="yy-mm-dd">yy-mm-dd</option>
				@endif

		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Room Lock Time</label>
		    <div class="col-sm-10">
		     <select class="form-control" name="room_lock">
		     @if($a['conf_booking_exptime']==2)
		      	<option value="2" selected="selected">2 Minute</option>
		      	<option value="5">5 Minute</option>
		      	<option value="10">10 Minute</option>
		      	<option value="20">20 Minute</option>
		      	<option value="30">30 Minute</option>
			 @elseif($a['conf_booking_exptime']==5)
			 	<option value="2">2 Minute</option>
		      	<option value="5" selected="selected">5 Minute</option>
		      	<option value="10">10 Minute</option>
		      	<option value="20">20 Minute</option>
		      	<option value="30">30 Minute</option>
			 @elseif($a['conf_booking_exptime']==10)
			 	<option value="2">2 Minute</option>
		      	<option value="5">5 Minute</option>
		      	<option value="10" selected="selected">10 Minute</option>
		      	<option value="20">20 Minute</option>
		      	<option value="30">30 Minute</option>
			 @elseif($a['conf_booking_exptime']==20)
			 	<option value="2">2 Minute</option>
		      	<option value="5">5 Minute</option>
		      	<option value="10">10 Minute</option>
		      	<option value="20" selected="selected">20 Minute</option>
		      	<option value="30">30 Minute</option>
			 @else
				<option value="2">2 Minute</option>
		      	<option value="5">5 Minute</option>
		      	<option value="10">10 Minute</option>
		      	<option value="20">20 Minute</option>
		      	<option value="30" selected="selected">30 Minute</option>
			 @endif

		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Tax</label>
		    <div class="col-sm-10">
		      <input type="text" name="tax" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_tax_amount']; }}">
		      @if($errors->has('tax'))
					{{ $errors->first('tax') }}
				@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Price Including Tax?</label>
		    <div class="col-sm-10">
		    @if($a['conf_price_with_tax'])
		      <input type="checkbox" name="price_include" value="1" checked> Hilangkan Centang untuk menonaktifkan
		    @else
		    	<input type="checkbox" name="price_include" value="1"> Centang untuk mengaktifkan
			@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">USD to IDR</label>
		    <div class="col-sm-10">
		      <input type="text" name="usd_idr" class="form-control" id="inputEmail3" placeholder="First Name" value="{{ $a['conf_currency_convertion_idr']; }}">
		      @if($errors->has('usd_idr'))
					{{ $errors->first('usd_idr') }}
				@endif
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Update</button>
				{{ Form::token() }}
		    </div>
		  </div>
		</form>

	</div> <!-- main-content -->

@stop