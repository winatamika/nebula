<?php

class Promo extends \Eloquent {
	protected $fillable = array('id', 'roomtype_id', 'checkin_start', 'checkin_finish', 'total_price', 'promo_name' , 'description', 'capacity_id');

	protected $table = 'promo';
}