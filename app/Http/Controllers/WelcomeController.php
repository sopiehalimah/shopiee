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



class WelcomeController extends Controller
{
    public function index()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $blog1 = array('blog1'=>blog::orderBy('id','desc')->limit(2)->get());
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(4)->get());
        $product = array('product'=>product::all());
        $cart = session('cart');
        return view('welcome')->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($blog1)->with($advertisement)->with('cart',$cart); 
    }

    public function contact()
    {
        return view('content/contact/contact');
    }

    public function text()
    {
        return view('content/contact/text');
    }

    public function faq()
    {
        return view('content/contact/faq');
    }

    public function blogs()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $product = array('product'=>product::all());
        $cart = session('cart');
        $blog = array('blog'=>blog::orderBy('id','desc')->paginate(2));
        $category = master_blog::all();
        return view('content/blog_app/blog')->with($blog)->with('categorys',$category)->with('master_parents', $master_parent)->with('master_kinds',$master_kind)->with('master_types',$master_type)->with('master_merks', $master_merk)->with('cart',$cart)->with($advertisement);
    }

    public function blogs_detail($slug)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $blog = blog::all();
        $product = array('product'=>product::all());
        $cart = session('cart');
        $category = master_blog::all();
        $data = array('data'=>blog::where('slug',$slug)->first());
        return view('content/blog_app/detail')->with($data)->with('categorys',$category)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with('cart',$cart)->with($advertisement);
    }


    public function product_detail($slug)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $advertisement = array('advertisement'=>advertisement::orderBy('id','desc')->limit(1)->get());
        $product = array('product'=>product::where('slug',$slug)->first());
        $product1 = array('product1'=>product::orderBy('id','desc')->limit(3)->get());
        $cart = session('cart');
        return view('content/product_app/detail')->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($product1)->with('cart',$cart)->with($advertisement);
    }

    public function carts()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $product1 = array('product1'=>product::orderBy('id','desc')->limit(3)->get());
        $product = array('product'=>product::all());
        $cart = session('cart');
        return view('content/cart/basketempty')->with('cart',$cart)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($product1);
    }

    public function cart()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $product1 = array('product1'=>product::orderBy('id','desc')->limit(3)->get());
        $product = array('product'=>product::all());
        $cart = session('cart');
        return view('content/cart/basket')->with('cart',$cart)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($product1);
    }

    public function save_cart(Request $r)
    {
        $key = count(session('cart'));
        $array  = session('cart');
        $array[$key+1]['id'] = Input::get('id');
        $array[$key+1]['code'] = Input::get('code');
        $array[$key+1]['code_parent'] = Input::get('code_parent');
        $array[$key+1]['code_kind'] = Input::get('code_kind');
        $array[$key+1]['code_type'] = Input::get('code_type');
        $array[$key+1]['code_merk'] = Input::get('code_merk');
        $array[$key+1]['pict_product1'] = Input::get('pict_product1');
        $array[$key+1]['pict_product2'] = Input::get('pict_product2');
        $array[$key+1]['name'] = Input::get('name');
        $array[$key+1]['desc'] = Input::get('desc');
        $array[$key+1]['slug'] = Input::get('slug');
        $array[$key+1]['price'] = Input::get('price');
        $array[$key+1]['kuantitas'] = "1";
        $array[$key+1]['subtotal'] = Input::get('subtotal');
        $array[$key+1]['total'] = Input::get('total');

        $r->session()->put('cart',  $array);
        
         // return $cart;
        return redirect()->back();


    }

    public function checkout_address()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $product = array('product'=>product::all());
        $cart = session('cart');
        return view('content/checkout/checkout1')->with('cart',$cart)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product);
    }

    public function checkout_address_save()
    {
        $data = new shipping;
        $data->id_user = Input::get('id_user');
        $data->name = Input::get('name');
        $data->email = Input::get('email');
        $data->telp = Input::get('telp');
        $data->state = Input::get('state');
        $data->country = Input::get('country');
        $data->address = Input::get('address');

        $data->save();

        $data1 = array('data1'=>shipping::all());

        return redirect(url('/checkout/delivery/'.$data->id))->with($data1);

    }

    public function checkout_address_edit($id)
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $product = array('product'=>product::all());
        $cart = session('cart');
        $data = array('data'=>shipping::find($id));
        return view('content/checkout/checkout1data')->with($data)->with('cart',$cart)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product);

    }


    public function checkout_delivery($id)
    {

        $data = array('data'=>shipping::find($id));
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $product = array('product'=>product::all());
        $cart = session('cart');

        return view('content/checkout/checkout2')->with('cart',$cart)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($data);
    }

    public function checkout_delivery_save()
    {

        $data1 = shipping::find(Input::get('id'));
        $data1->id_user = Input::get('id_user');
        $data1->name = Input::get('name');
        $data1->email = Input::get('email');
        $data1->telp = Input::get('telp');
        $data1->state = Input::get('state');
        $data1->country = Input::get('country');
        $data1->address = Input::get('address');
        $data1->delivery = Input::get('delivery');


        $data1->save();

        $data2 = array('data1'=>shipping::all());

        return redirect(url('/checkout/payment/'.$data1->id))->with($data2);
    }

    public function checkout_payment($id)
    {

        $data = array('data'=>shipping::find($id));
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $product = array('product'=>product::all());
        $cart = session('cart');

        return view('content/checkout/checkout3')->with('cart',$cart)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with($data);
    }


    public function checkout_payment_save()
    {

        $data1 = shipping::find(Input::get('id'));
        $data1->id_user = Input::get('id_user');
        $data1->name = Input::get('name');
        $data1->email = Input::get('email');
        $data1->telp = Input::get('telp');
        $data1->state = Input::get('state');
        $data1->country = Input::get('country');
        $data1->address = Input::get('address');
        $data1->delivery = Input::get('delivery');
        $data1->payment = Input::get('payment');

        $data1->save();

        return redirect(url('/checkout/order/'));
    }

    public function checkout_order()
    {

        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $blog = blog::all();
        $product = array('product'=>product::all());
        $cart = session('cart');
        return view('content/checkout/checkout4')->with('cart',$cart)->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product);
    }

    public function checkout_order_save(Request $r)
    {

        $cart = session('cart');
          if(count($cart)!=0)
          {
            foreach($cart as $key => $cart2){
                $order = new order;
                $order->id_user = Input::get('id_user');
                $order->code_order = Input::get('code_order');
                $order->code = $r->input('code_'.$cart[$key]['id']);
                $order->code_parent = $r->input('code_parent_'.$cart[$key]['id']);
                $order->code_kind = $r->input('code_kind_'.$cart[$key]['id']);
                $order->code_type = $r->input('code_type_'.$cart[$key]['id']);
                $order->code_merk = $r->input('code_merk_'.$cart[$key]['id']);
                $order->pict_product1 = $r->input('pict_product1_'.$cart[$key]['id']);
                $order->pict_product2 = $r->input('pict_product2_'.$cart[$key]['id']);
                $order->name = $r->input('name_'.$cart[$key]['id']);
                $order->desc = $r->input('desc_'.$cart[$key]['id']);
                $order->price = $r->input('price_'.$cart[$key]['id']);
                $order->slug = $r->input('slug_'.$cart[$key]['id']);
                $order->status = Input::get('status');
                $order->kuantitas = $r->input('kuantitas_'.$cart[$key]['id']);
                $order->subtotal = $r->input('subtotal_'.$cart[$key]['id']);
                $order->total = $r->input('total_'.$cart[$key]['id']);


                $order->save();

            
          }
          $r->session()->forget('cart');
        }

        return redirect(url('/'));
    }
    public function updatecartorder(Request $r, $id){

        // $key = count(session('cart'));
        $array  = session('cart');
        $array[$id] = $r->$id;
        $array[$id]['id'] = Input::get('id');
        $array[$id]['code'] = Input::get('code');
        $array[$id]['code_parent'] = Input::get('code_parent');
        $array[$id]['code_kind'] = Input::get('code_kind');
        $array[$id]['code_type'] = Input::get('code_type');
        $array[$id]['code_merk'] = Input::get('code_merk');
        $array[$id]['pict_product1'] = Input::get('pict_product1');
        $array[$id]['pict_product2'] = Input::get('pict_product2');
        $array[$id]['name'] = Input::get('name');
        $array[$id]['desc'] = Input::get('desc');
        $array[$id]['slug'] = Input::get('slug');
        $array[$id]['price'] = Input::get('price');
        $array[$id]['kuantitas'] = Input::get('kuantitas');
        $array[$id]['subtotal'] = Input::get('subtotal');
        $array[$id]['total'] = Input::get('total');

        $r->session()->put('cart',  $array);

        // return $cart;
        return redirect()->back();
    
    }




    public function updatecart(Request $r, $id){

        // $key = count(session('cart'));
        $array  = session('cart');
        $array[$id] = $r->$id;
        $array[$id]['id'] = Input::get('id');
        $array[$id]['code'] = Input::get('code');
        $array[$id]['code_parent'] = Input::get('code_parent');
        $array[$id]['code_kind'] = Input::get('code_kind');
        $array[$id]['code_type'] = Input::get('code_type');
        $array[$id]['code_merk'] = Input::get('code_merk');
        $array[$id]['pict_product1'] = Input::get('pict_product1');
        $array[$id]['pict_product2'] = Input::get('pict_product2');
        $array[$id]['name'] = Input::get('name');
        $array[$id]['desc'] = Input::get('desc');
        $array[$id]['slug'] = Input::get('slug');
        $array[$id]['price'] = Input::get('price');
        $array[$id]['kuantitas'] = Input::get('kuantitas');
        $array[$id]['subtotal'] = Input::get('subtotal');
        $array[$id]['total'] = Input::get('total');

        $r->session()->put('cart',  $array);

        // return $cart;
        return redirect()->back();
    
    }

    public function orders_history()
    {
        $master_parent = master_parent::with('class')->with('class.class2')->get();
        $master_kind = array('master_kind'=>master_kind::all());
        $master_type = array('master_type'=>master_type::all());
        $master_merk = master_merk::all();
        $master_blog = master_blog::all();
        $product = array('product'=>product::all());
        $blog = blog::all();
        $cart = session('cart');
        return view('content/orders/history')->with('master_parents', $master_parent)->with($master_kind)->with($master_type)->with('master_merks', $master_merk)->with('master_blogs', $master_blog)->with('blogs', $blog)->with($product)->with('cart',$cart);
    }
}
