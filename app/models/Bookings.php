<?php

class Bookings extends \Eloquent {
	protected $fillable = array('booking_id', 'booking_time', 'start_date', 'end_date', 'client_id', 'adult' , 'child', 'total_cost', 'payment_ammount' , 'payment_success','payment_type','special_request','is_block','is_deleted','block_name');

	protected $table = 'bookings';

}