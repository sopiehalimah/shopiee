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



class ProductController extends Controller
{


    public function category_type(Request $request,$master_type_name,$type_name,$sub_type_name)
    {
        $master_types = master_type::with('class')->with('class.class2')->get();

        $m_type = master_type::where('name',$master_type_name)->get()->toArray();
        $m_types = array_column($m_type,'id');

        $type = type::where('name',$type_name)->get()->toArray();
        $types = array_column($type,'id');

        $sub_type = sub_type::where('name',$sub_type_name)->get()->toArray();
        $sub_types = array_column($sub_type, 'id');

        $master_merk = master_merk::all();
        $category = category::all();
        $article = article::all();
        $article1 = array('article1'=>article::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        // $product = array('product'=>product::all());
        $cart = session('cart');
        $product = product::where('sub_type_id',$sub_types)->orderBy('id','desc')->paginate(12);

        $request->session()->put('master_type_name',$master_type_name);
        $request->session()->put('type_name',$type_name);
        $request->session()->put('sub_type_name',$sub_type_name);

        return view('content/product_app/product')->with('master_types',$master_types)->with($type)->with($sub_type)->with('master_merks', $master_merk)->with('categorys', $category)->with('articles', $article)->with('cart',$cart)->with('products',$product)->with($advertisement);
        // return $product;
    }

    public function category_parent(Request $request,$master_type_name)
    {
        
        $master_types = master_type::with('class')->with('class.class2')->get();

        $m_type = master_type::where('name',$master_type_name)->get()->toArray();
        $m_types = array_column($m_type,'id');

        // $type = type::where('name',$type_name)->get()->toArray();
        // $types = array_column($type,'id');

        // $sub_type = sub_type::where('name',$sub_type_name)->get()->toArray();
        // $sub_types = array_column($sub_type, 'id');

        $master_merk = master_merk::all();
        $category = category::all();
        $article = article::all();
        $article1 = array('article1'=>article::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        $cart = session('cart');
        $product = product::where('master_type_id',$m_types)->orderBy('id','desc')->paginate(12);

        $request->session()->put('master_type_name',$master_type_name);
        // $request->session()->put('type_name',$type_name);
        // $request->session()->put('sub_type_name',$sub_type_name);

        return view('content/product_app/product1')->with('master_types',$master_types)->with('master_merks', $master_merk)->with('categorys', $category)->with('articles', $article)->with('cart',$cart)->with('products',$product)->with($advertisement);
    }

    public function category_kind(Request $request,$master_type_name,$type_name)
    {
        
        $master_types = master_type::with('class')->with('class.class2')->get();

        $m_type = master_type::where('name',$master_type_name)->get()->toArray();
        $m_types = array_column($m_type,'id');

        $type = type::where('name',$type_name)->get()->toArray();
        $types = array_column($type,'id');

        // $sub_type = sub_type::where('name',$sub_type_name)->get()->toArray();
        // $sub_types = array_column($sub_type, 'id');

        $master_merk = master_merk::all();
        $category = category::all();
        $article = article::all();
        $article1 = array('article1'=>article::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        $cart = session('cart');
        $product = product::where('type_id',$types)->orderBy('id','desc')->paginate(12);

        $request->session()->put('master_type_name',$master_type_name);
        $request->session()->put('type_name',$type_name);
        // $request->session()->put('sub_type_name',$sub_type_name);

        return view('content/product_app/product2')->with('master_types',$master_types)->with($type)->with('master_merks', $master_merk)->with('categorys', $category)->with('articles', $article)->with('cart',$cart)->with('products',$product)->with($advertisement);
    }

    public function brand(Request $request,$name)
    {
        $master_type = master_type::with('class')->with('class.class2')->get();
        $type = array('type'=>type::all());
        $sub_type = array('sub_type'=>sub_type::all());
        $master_merk = master_merk::all();
        $category = category::all();
        $article = article::all();
        $article1 = array('article1'=>article::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        $cart = session('cart');
        $product = product::where('code_merk', '=', $name)->orderBy('id','desc')->paginate(12);
        $request->session()->put('name',$name);

        return view('content/product_app/product3')->with('master_types',$master_type)->with($type)->with($sub_type)->with('master_merks', $master_merk)->with('categorys', $category)->with('articles', $article)->with('products',$product)->with($article1)->with($advertisement)->with('cart',$cart); 
    }
}
