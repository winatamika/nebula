<?php

class Invoice extends \Eloquent {
	public $timestamps = false; 
	protected $fillable = array('id_invoice', 'booking_id', 'client_name', 'client_email', 'invoice');

	protected $table = 'invoice';

} 