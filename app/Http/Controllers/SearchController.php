<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\article;
use App\advertisement;
use App\category;
use App\master_parent;
use App\master_kind;
use App\master_type;
use App\type;
use App\sub_type;
use App\master_merk;
use App\product;
use App\shipping;
use App\User;
use App\order;
use App\contact;
use DB;
use Auth;


class SearchController extends Controller
{
    public function search(Request $request)
    {

    	$query = $request->get('q');
    	$hasil = product::where('name', 'LIKE', '%' . $query . '%')->orWhere('price', 'LIKE', '%' . $query . '%')->paginate(12);
    	$master_type = master_type::with('class')->with('class.class2')->get();
        $type = array('type'=>type::all());
        $sub_type = array('sub_type'=>sub_type::all());
        $master_merk = master_merk::all();
        $category = category::all();
        $article = article::all();
        $article1 = array('article1'=>article::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        $product = array('product'=>product::all());
        $cart = session('cart');
    	return view('content/search/result', compact('hasil', 'query'))->with('master_types',$master_type)->with($type)->with($sub_type)->with('master_merks', $master_merk)->with('categorys', $category)->with('articles', $article)->with($product)->with($article1)->with($advertisement)->with('cart',$cart);
    }

    public function search_code_order(Request $request)
    {

        $query = $request->get('search_code_order');
        $hasil = order::where('code_shipping', 'LIKE', '%' . $query . '%')->limit(1)->get();
        $master_type = master_type::with('class')->with('class.class2')->get();
        $type = array('type'=>type::all());
        $sub_type = array('sub_type'=>sub_type::all());
        $master_merk = master_merk::all();
        $category = category::all();
        $article = article::all();
        $article1 = array('article1'=>article::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        $order = array('order'=>order::all());
        $product = array('product'=>product::all());
        $cart = session('cart');

        return view('content/search/result_code_order', compact('hasil', 'query'))->with('master_types',$master_type)->with($type)->with($sub_type)->with('master_merks', $master_merk)->with('categorys', $category)->with('articles', $article)->with($product)->with($article1)->with($advertisement)->with('cart',$cart)->with($order);
    }
}
