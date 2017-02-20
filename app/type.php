<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    public function class2(){
    	return $this->hasMany('\App\sub_type','type_id','id');
    }
}
