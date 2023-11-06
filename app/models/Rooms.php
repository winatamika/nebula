<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

 class Room extends Eloquent
 {
public $timestamps = false; 
protected $fillable = array('name_room', 'adult_capacity','child_capacity','desc','image','count','multiimage','facility','extrabed');


public function getrooms(){
return $this->has_many('Priceplan');
}

}