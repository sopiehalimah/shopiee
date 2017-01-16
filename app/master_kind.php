<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_kind extends Model
{
     public function class2(){
    	return $this->hasMany('\App\master_type','code_kind','code');
    }
}
