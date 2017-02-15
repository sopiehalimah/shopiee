<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_parent extends Model
{
    public function class(){
    	return $this->hasMany('\App\master_kind','code_parent','code');
    }
}
