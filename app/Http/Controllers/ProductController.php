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

class ProductController extends Controller
{
    public function OBLONG()
    {
    	$master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
    	$data = array('data'=>product::where('code_type', '=', 'OB')->orderBy('id','desc')->get());
    	return view('content/product_app/product')->with($data)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog);
    }
    public function SHOES()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $data = array('data'=>product::where('code_type', '=', 'SHO')->orderBy('id','desc')->paginate(12));
        return view('content/product_app/product')->with($data)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog);
    }

    public function SPORT()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $data = array('data'=>product::where('code_kind', '=', 'SPO')->orderBy('id','desc')->paginate(12));
        return view('content/product_app/product')->with($data)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog);
    }

    public function MAN()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $data = array('data'=>product::where('code_parent', '=', 'MAN')->orderBy('id','desc')->paginate(12));
        return view('content/product_app/product_parent')->with($data)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog);
    }
}
