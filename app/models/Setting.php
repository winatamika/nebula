<?php

class Setting extends Eloquent {
	protected $fillable = array('conf_key', 'conf_value');

	protected $table = 'configure';


}