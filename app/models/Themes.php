<?php

class Themes extends \Eloquent {
	protected $fillable = ['id', 'theme', 'default', 'header', 'footer'];

	protected $table = 'clients';
}