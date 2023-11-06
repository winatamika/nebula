<?php

class Earlybird extends \Eloquent {
	protected $fillable = array('id', 'roomtype_id', 'checkin_start', 'checkin_finish', 'minimum_stay', 'earlybird_days' , 'discount');

	protected $table = 'earlybirdprocess';

}