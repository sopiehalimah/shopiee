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
use DB;
use Auth;


class SearchController extends Controller
{
    public function search(Request $request)
    {

    	$query = $request->get('q');
    	$hasil = product::where('name', 'LIKE', '%' . $query . '%')->paginate(12);
    	$master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $blog1 = array('blog1'=>blog::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        $product = array('product'=>product::all());
        $cart = session('cart');
    	return view('content/search/result', compact('hasil', 'query'))->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($blog1)->with($advertisement)->with('cart',$cart);
    }

    public function search_code_order(Request $request)
    {

        $query = $request->get('search_code_order');
        $hasil = order::where('code_order', 'LIKE', '%' . $query . '%')->limit(1)->get();
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $blog1 = array('blog1'=>blog::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        $product = array('product'=>product::all());
        $order = array('order'=>order::all());
        $cart = session('cart');
        return view('content/search/result_code_order', compact('hasil', 'query'))->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($blog1)->with($advertisement)->with('cart',$cart)->with($order);
    }
}
