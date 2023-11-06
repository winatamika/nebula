<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Priceplan extends Eloquent
{
public $table = 'priceplan';
public $timestamps = false;

protected $fillable = array('room_id','start_date','end_date','sun','mon','tue','wed','thu','fri','sat', 'default_plan');

}

?>