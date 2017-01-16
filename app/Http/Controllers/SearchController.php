<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\blog;
use App\master_blog;
use App\master_parent;
use App\master_kind;
use App\master_type;
use App\master_merk;
use App\product;


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
        $product = array('product'=>product::all());

    	return view('content/search/result', compact('hasil', 'query'))->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product);
    }
}
