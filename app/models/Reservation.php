<?php

class Reservation extends \Eloquent {
	protected $fillable = array('id', 'booking_id', 'room_id');

	protected $table = 'reservation';

} 