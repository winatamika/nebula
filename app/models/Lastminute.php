<?php

class Lastminute extends \Eloquent {
	protected $fillable = array('id', 'roomtype_id', 'checkin_start', 'checkin_finish', 'minimum_stay', 'lastminute_days' , 'discount');

	protected $table = 'lastminute';
}