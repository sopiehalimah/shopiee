<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
use App\order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = array('product'=>product::orderBy('id','desc')->limit(4)->get());
        $advertisement = array('advertisement'=>advertisement::all());
        return view('home')->with($product)->with($advertisement);
    }



    //MASTER BLOG

    public function master_blog_add()
    {
        return view('/admin/master_blog/add');
    }

    public function master_blog_table() 
    {
        $data = array('data'=>master_blog::all());
        return view('admin.master_blog.table')->with($data);
    }

    public function master_blog_save()
    {

        $data = new master_blog;
        $data->category = Input::get('category');
        $data->save();

        return redirect(url('/master_blog/table'));
    }

    public function master_blog_edit($id) 
    {
        $data = array('data'=>master_blog::find($id));
        return view('admin.master_blog.edit')->with($data);
    }

    public function master_blog_update() 
    {
        $data = master_blog::find(Input::get('id'));
        $data->category = Input::get('category');
        $data->save();

        return redirect(url('/master_blog/table'));
    }

    public function master_blog_delete($id)
    {
        master_blog::find($id)->delete();
        return redirect()->back();
    }



    //BLOG

    public function blog_add()
    {
        $master_blog = master_blog::all();
        return view('/admin/blog/add')->with('master_blogs',$master_blog);
    }

    public function blog_table() 
    {

        $data = array('data'=>blog::all());
        return view('/admin/blog/table')->with($data);
    }

    public function blog_save()
    {
        $data = new blog;
        $data->title = Input::get('title');
        $data->category = Input::get('category');
        $data->content = Input::get('content');
        $data->slug = str_slug(Input::get('title'));
        $data->author = Input::get('author');

        if(Input::hasFile('pict')){
            $pict = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict')->getClientOriginalExtension();

            Input::file('pict')->move(storage_path(),$pict);
            $data->pict = $pict;

         }
        $data->save();

        return redirect(url('/blog/table'));
    }

    public function blog_edit($id) 
    {
        $master_blog = master_blog::all();
        $data = array('data'=>blog::find($id));
        return view('admin.blog.edit')->with($data)->with('master_blogs',$master_blog);
    }

    public function blog_update() 
    {
        $data = blog::find(Input::get('id'));
        $data->title = Input::get('title');
        $data->category = Input::get('category');
        $data->content = Input::get('content');
        $data->author = Input::get('author');

        if(Input::hasFile('pict')){
            $pict = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict')->getClientOriginalExtension();

            Input::file('pict')->move(storage_path(),$pict);
            $data->pict = $pict;

         }

        $data->save();

        return redirect(url('/blog/table'));
    }

    public function blog_delete($id)
    {
        blog::find($id)->delete();
        return redirect()->back();
    }


    //ADVERTISEMENT

    public function advertisement_add()
    {
        $master_blog = master_blog::all();
        return view('/admin/advertisement/add')->with('master_blogs',$master_blog);
    }

    public function advertisement_table() 
    {

        $data = array('data'=>advertisement::all());
        return view('/admin/advertisement/table')->with($data);
    }

    public function advertisement_save()
    {
        $data = new advertisement;
        $data->category = Input::get('category');

        if(Input::hasFile('pict_ad')){
            $pict_ad = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict_ad')->getClientOriginalExtension();

            Input::file('pict_ad')->move(storage_path(),$pict_ad);
            $data->pict_ad = $pict_ad;

         }
        $data->save();

        return redirect(url('/advertisement/table'));
    }

    public function advertisement_edit($id) 
    {
        $master_blog = master_blog::all();
        $data = array('data'=>advertisement::find($id));
        return view('admin.advertisement.edit')->with($data)->with('master_blogs',$master_blog);
    }

    public function advertisement_update() 
    {
        $data = advertisement::find(Input::get('id'));
        $data->category = Input::get('category');

        if(Input::hasFile('pict_ad')){
            $pict_ad = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict_ad')->getClientOriginalExtension();

            Input::file('pict_ad')->move(storage_path(),$pict_ad);
            $data->pict_ad = $pict_ad;

         }

        $data->save();

        return redirect(url('/advertisement/table'));
    }

    public function advertisement_delete($id)
    {
        advertisement::find($id)->delete();
        return redirect()->back();
    }



    //MASTER PARENT

    public function master_parent_add()
    {
        $data = array('data'=>master_parent::all());
        return view('/admin/master_parent/add')->with($data);
    }

    public function master_parent_table() 
    {
        $data = array('data'=>master_parent::all());
        return view('admin.master_parent.table')->with($data);
    }

    public function master_parent_save()
    {

        $data = new master_parent;
        $data->code = Input::get('code');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_parent/table'));
    }

    public function master_parent_edit($id) 
    {
        $data = array('data'=>master_parent::find($id));
        return view('admin.master_parent.edit')->with($data);
    }

    public function master_parent_update() 
    {
        $data = master_parent::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_parent/table'));
    }

    public function master_parent_delete($id)
    {
        master_parent::find($id)->delete();
        return redirect()->back();
    }



    //MASTER KIND

    public function master_kind_add()
    {
        $master_parent = master_parent::all();
        return view('/admin/master_kind/add')->with('master_parents',$master_parent);
    }

    public function master_kind_table() 
    {
        $data = array('data'=>master_kind::all());
        return view('admin.master_kind.table')->with($data);
    }

    public function master_kind_save()
    {

        $data = new master_kind;
        $data->code = Input::get('code');
        $data->code_parent = Input::get('code_parent');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_kind/table'));
    }

    public function master_kind_edit($id) 
    {
        $master_parent = master_parent::all();
        $data = array('data'=>master_kind::find($id));
        return view('admin.master_kind.edit')->with($data)->with('master_parents',$master_parent);
    }

    public function master_kind_update() 
    {
        $data = master_kind::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->code_parent = Input::get('code_parent');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_kind/table'));
    }

    public function master_kind_delete($id)
    {
        master_kind::find($id)->delete();
        return redirect()->back();
    }


    //MASTER MERK

    public function master_merk_add()
    {
        return view('/admin/master_merk/add');
    }

    public function master_merk_table() 
    {
        $data = array('data'=>master_merk::all());
        return view('admin.master_merk.table')->with($data);
    }

    public function master_merk_save()
    {

        $data = new master_merk;
        $data->code = Input::get('code');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_merk/table'));
    }

    public function master_merk_edit($id) 
    {
        $data = array('data'=>master_merk::find($id));
        return view('admin.master_merk.edit')->with($data);
    }

    public function master_merk_update() 
    {
        $data = master_merk::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_merk/table'));
    }

    public function master_merk_delete($id)
    {
        master_merk::find($id)->delete();
        return redirect()->back();
    }


    //MASTER TYPE

    public function master_type_add()
    {
        $master_parent = master_parent::all();
        $master_kind = master_kind::all();
        return view('/admin/master_type/add')->with('master_parents',$master_parent)->with('master_kinds',$master_kind);
    }

    public function master_type_table() 
    {
        $data = array('data'=>master_type::all());
        return view('admin.master_type.table')->with($data);
    }

    public function master_type_save()
    {

        $data = new master_type;
        $data->code = Input::get('code');
        $data->code_parent = Input::get('code_parent');
        $data->code_kind = Input::get('code_kind');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_type/table'));
    }

    public function master_type_edit($id) 
    {
        $master_parent = master_parent::all();
        $master_kind = master_kind::all();
        $data = array('data'=>master_type::find($id));
        return view('admin.master_type.edit')->with($data)->with('master_parents',$master_parent)->with('master_kinds',$master_kind);
    }

    public function master_type_update() 
    {
        $data = master_type::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->code_parent = Input::get('code_parent');
        $data->code_kind = Input::get('code_kind');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_type/table'));
    }

    public function master_type_delete($id)
    {
        master_type::find($id)->delete();
        return redirect()->back();
    }


    //MASTER PRODUCT

    public function product_add()
    {
        $master_parent = master_parent::all();
        $master_kind = master_kind::all();
        $master_type = master_type::all();
        $master_merk = master_merk::all();
        return view('/admin/product/add')->with('master_parents', $master_parent)->with('master_kinds',$master_kind)->with('master_types',$master_type)->with('master_merks', $master_merk);
    }

    public function product_table() 
    {
        $data = array('data'=>product::all());
        return view('admin.product.table')->with($data);
    }

    public function product_save()
    {

        $data = new product;
        $data->code = Input::get('code');
        $data->code_parent = Input::get('code_parent');
        $data->code_kind = Input::get('code_kind');
        $data->code_type = Input::get('code_type');
        $data->code_merk = Input::get('code_merk');
        $data->name = Input::get('name');
        $data->price = Input::get('price');
        $data->desc = Input::get('desc');
        $data->slug = str_slug(Input::get('name'));

        if(Input::hasFile('pict_product1')){
            $pict_product1 = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict_product1')->getClientOriginalExtension();

            Input::file('pict_product1')->move(storage_path(),$pict_product1);
            $data->pict_product1 = $pict_product1;

         }

         if(Input::hasFile('pict_product2')){
            $pict_product2 = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict_product2')->getClientOriginalExtension();

            Input::file('pict_product2')->move(storage_path(),$pict_product2);
            $data->pict_product2 = $pict_product2;

         }

        $data->save();
        return redirect(url('/product/table'));
    }

    public function product_edit($id) 
    {
        $master_parent = master_parent::all();
        $master_kind = master_kind::all();
        $master_type = master_type::all();
        $master_merk = master_merk::all();
        $data = array('data'=>product::find($id));
        return view('admin.product.edit')->with($data)->with('master_parents', $master_parent)->with('master_kinds',$master_kind)->with('master_types',$master_type)->with('master_merks', $master_merk);
    }

    public function product_update() 
    {
        $data = product::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->code_parent = Input::get('code_parent');
        $data->code_kind = Input::get('code_kind');
        $data->code_type = Input::get('code_type');
        $data->code_merk = Input::get('code_merk');
        $data->name = Input::get('name');
        $data->price = Input::get('price');
        $data->desc = Input::get('desc');
        $data->slug = str_slug(Input::get('name'));

        if(Input::hasFile('pict_product1')){
            $pict_product1 = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict_product1')->getClientOriginalExtension();

            Input::file('pict_product1')->move(storage_path(),$pict_product1);
            $data->pict_product1 = $pict_product1;

         }

         if(Input::hasFile('pict_product2')){
            $pict_product2 = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('pict_product2')->getClientOriginalExtension();

            Input::file('pict_product2')->move(storage_path(),$pict_product2);
            $data->pict_product2 = $pict_product2;

         }
         
        $data->save();
        return redirect(url('/product/table'));
    }

    public function product_delete($id)
    {
        product::find($id)->delete();
        return redirect()->back();
    }


    //ORDER
    public function order_table()
    {
        // $data = array('data'=>order::where('status' == 'pending')->get());
        $data['data'] = order::where('status','pending')->orderBy('id','desc')->get();
        return view('admin/order/table')->with($data);
    }

    public function order_sent()
    {
        $data['data'] = order::where('status','accepted')->orderBy('id','desc')->get();
        return view('admin/order/sent')->with($data);
    }


    public function accept_order(Request $r ,$code_order)
    {
        $select_order = order::where('code_order',$code_order)->update(['status'=>'accepted']);
        // $order  = order::find($select_order->id);
        // $order->status = 'accepted';
        // $order->save();

        // $r->save()->put('order',  $array);
        return redirect()->back();

    }

    public function sent_order(Request $r ,$code_order)
    {
        $select_order = order::where('code_order',$code_order)->update(['status'=>'sent']);
        // $order  = order::find($select_order->id);
        // $order->status = 'accepted';
        // $order->save();

        // $r->save()->put('order',  $array);
        return redirect()->back();

    }

     //ORDER
     public function mail_order_data()
    {
        $data['data'] = order::where('status','accepted')->get();
        return view('admin/order/info_all')->with($data);
    }
    public function mail_order($code_order)
    {
        $data['data'] = order::where('code_order',$code_order)->get();
        $data['data1'] = order::where('code_order',$code_order)->orderBy('id_user','desc')->limit(1)->get();
        $data['data2'] = order::where('code_order',$code_order)->orderBy('total','desc')->limit(1)->get();
        return view('admin/order/info')->with($data);
        // return $data;

    }


    public function order_all()
    {
        $data['data'] = order::where('status','sent')->where('evidence','!=', 'not yet','||','evidence','==','not yet')->get();
        return view('admin/order/all')->with($data);
    }


    public function send_mail(Request $r, $code_order)
    {

      $id_user = $r->input('id_user');
      $code_order = $r->input('code_order');
      $code_shipping = $r->input('code_shipping');
      $pict_product1 = $r->input('pict_product1');
      $name = $r->input('name');
      $price = $r->input('price');
      $ongkir = $r->input('ongkir');
      $total = $r->input('total');
        // $data['data'] = order::where('code_order',$code_order)->get();
        // $data['data1'] = order::where('code_order',$code_order)->orderBy('id_user','desc')->limit(1)->get();
        // $data['data2'] = order::where('code_order',$code_order)->orderBy('total','desc')->limit(1)->get();

        try{

          $a = new \PHPMailer(true);
          $a->isSMTP();
          $a->CharSet = "utf-8";
          $a->SMTPAuth = true;
          $a->SMTPSecure = "tls";
          $a->Host = "smtp.gmail.com";
          $a->Port = 587;
          $a->Username = "sopiehalimah@gmail.com";
          $a->Password = "chanyeol";
          $a->SetFrom("sopiehalimah@gmail.com","Sopie Halimah");
          $a->Subject = "Detail Pemesanan";
          $a->MsgHTML('<h1>'.'#'.'<a href="http://localhost:8000/orders/confirm/">'.$code_shipping.'</a>'.'</h1>'
                        // '<br>'.
                        // '<table border="1" style="width:500px;text-align:center;">'.
                        //         '<thead>'.
                        //             '<tr>'.

                        //                 '<th>Picture</th>'.
                        //                 '<th>Product Name</th>'.
                        //                 '<th>Price</th>'.
                        //             '</tr>'.
                        //         '</thead>'.
                        //         '<tbody>'.
                        //             '<tr>'.
                        //                 '<td>'.'<img src="{{url("pict_product1/".$pict_product1)}}" alt="" style="max-width:100%;height: 100px;">'.'</td>'.
                        //                 '<td>'.$name.'</td>'.
                        //                 '<td>'."Rp.".number_format($price,0,',','.').",-".'</td>'.
                        //             '</tr>'.
                        //         '</tbody>'.
                        //         '<tfoot>'.
                        //                 '<tr>'.
                        //                     '<th colspan="2">'.'Shipping Cost'.'</th>'.
                        //                     '<th>'."Rp.".number_format($ongkir,0,',','.').",-".'</th>'.
                        //                 '</tr>'.
                        //                 '<tr>'.
                        //                     '<th colspan="2">'.'Total'.'</th>'.
                        //                    ' <th>'."Rp.".number_format($total,0,',','.').",-".'</th>'.
                        //                 '</tr>'.
                        //         '</tfoot>'.
                        //     '</table>'
                            );
          $a->addAddress($id_user);
          $a->send();
          }
          catch(Exception $e) {
          dd($e);
          }

        return redirect(url('/order/mail'));
          // return $data;
        }




}
