<?php

class Payment extends \Eloquent {
	protected $fillable = array('gateway_code', 'account', 'enabled');

	protected $table = 'payment_gateway';

}