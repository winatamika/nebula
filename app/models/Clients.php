<?php

class Clients extends \Eloquent {
	protected $fillable = ['id', 'first_name', 'title', 'street_addr', 'city', 'province', 'zip',
							'country', 'phone', 'fax', 'email', 'additional_comments'];

	protected $table = 'clients';
}