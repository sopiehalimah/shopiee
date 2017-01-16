<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['id_user','code_order','code','code_parent','code_kind','code_type','code_merk','pict_product1','pict_product2','name','desc','price','slug','kuantitas','subtotal','total'];
}
