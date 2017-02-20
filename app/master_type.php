<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_type extends Model
{
    public function class(){
    	return $this->hasMany('\App\type','master_type_id','id');
    }
}
