<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\blog;
use App\advertisement;
use App\master_blog;
use App\master_parent;
use App\master_kind;
use App\master_type;
use App\master_merk;
use App\product;
use App\shipping;
use App\User;
use App\order;

class BlogController extends Controller
{
    public function category($category)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $product = array('product'=>product::all());
        $cart = session('cart');
        $blog = array('blog'=>blog::orderBy('id','desc')->where('category', '=', $category)->paginate(5));
        $category = master_blog::all();
        return view('content/blog_app/category')->with($blog)->with('categorys',$category)->with('master_parents', $master_parent)->with('master_kinds',$master_kind)->with('master_types',$master_type)->with('master_merks', $master_merk)->with('cart',$cart)->with($advertisement);
        }
}
