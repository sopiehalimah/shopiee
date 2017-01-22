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


class ProductController extends Controller
{


    public function category_type($name)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $cart = session('cart');
        $product = array('product'=>product::where('code_type', '=', $name)->orderBy('id','desc')->paginate(12));
        return view('content/product_app/product')->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with('cart',$cart)->with($product)->with($advertisement);
    }

    public function category_parent($name)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $blog = blog::all();
        $cart = session('cart');
        $product = array('product'=>product::where('code_parent', '=', $name)->orderBy('id','desc')->paginate(12));
        return view('content/product_app/product')->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with('cart',$cart)->with($product)->with($advertisement);
    }

    public function category_kind($name)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $cart = session('cart');
        $product = array('product'=>product::where('code_kind', '=', $name)->orderBy('id','desc')->paginate(12));
        return view('content/product_app/product')->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with('cart',$cart)->with($product)->with($advertisement);
    }

    public function brand($name)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $cart = session('cart');
        $product = array('product'=>product::where('code_merk', '=', $name)->orderBy('id','desc')->paginate(12));
        return view('content/product_app/product')->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with('cart',$cart)->with($product)->with($advertisement);
    }
}
