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
use App\type;
use App\sub_type;
use App\master_merk;
use App\product;
use App\shipping;
use App\User;
use App\order;
use App\contact;
use App\category;
use App\article;

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
        $product = array('product'=>product::all());
        $advertisement = array('advertisement'=>advertisement::all());
        $req_order = array('req_order'=>order::select('code_order','code_shipping','total','id_user','status','payment','evidence','confirm')->groupBy('code_order','code_shipping','status','id_user','total','payment','evidence','confirm')->orwhere('status','Pending')->orwhere('status','Accepted')->get());
        $all_order = array('all_order'=>order::select('code_order','code_shipping','total','id_user','status','payment','evidence','confirm')->groupBy('code_order','code_shipping','status','id_user','total','payment','evidence','confirm')->where('status','!=','Pending')->get());
        $customer['customer'] = User::where('role','member')->get();
        $contact['contact'] = contact::all();
        return view('home')->with($product)->with($advertisement)->with($req_order)->with($all_order)->with($customer)->with($contact);
    }



    //MASTER BLOG

    public function master_category_add()
    {
        return view('/admin/master_category/add');
    }

    public function master_category_table() 
    {
        $data = array('data'=>category::all());
        return view('admin/master_category/table')->with($data);
    }

    public function master_category_save()
    {

        $data = new category;
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_category/table'));
    }

    public function master_category_edit($id) 
    {
        $data = array('data'=>category::find($id));
        return view('admin/master_category/edit')->with($data);
    }

    public function master_category_update() 
    {
        $data = category::find(Input::get('id'));
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_category/table'));
    }

    public function master_category_delete($id)
    {
        category::find($id)->delete();
        return redirect()->back();
    }



    //BLOG

    public function article_add()
    {
        $category = category::all();
        return view('/admin/article/add')->with('categorys',$category);
    }

    public function article_table() 
    {

        $data = array('data'=>article::all());
        return view('/admin/article/table')->with($data);
    }

    public function article_save()
    {
        $data = new article;
        $data->title = Input::get('title');
        $data->category_id = Input::get('category_id');
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

        return redirect(url('/article/table'));
    }

    public function article_edit($id) 
    {
        $category = category::all();
        $data = array('data'=>article::find($id));
        return view('admin.article.edit')->with($data)->with('categorys',$category);
    }

    public function article_update() 
    {
        $data = article::find(Input::get('id'));
        $data->title = Input::get('title');
        $data->category_id = Input::get('category_id');
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

        return redirect(url('/article/table'));
    }

    public function article_delete($id)
    {
        article::find($id)->delete();
        return redirect()->back();
    }


    //ADVERTISEMENT

    public function advertisement_add()
    {
        $category = category::all();
        return view('/admin/advertisement/add')->with('categorys',$category);
    }

    public function advertisement_table() 
    {

        $data = array('data'=>advertisement::all());
        return view('/admin/advertisement/table')->with($data);
    }

    public function advertisement_save()
    {
        $data = new advertisement;
        $data->category_id = Input::get('category_id');

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
        $category = category::all();
        $data = array('data'=>advertisement::find($id));
        return view('admin.advertisement.edit')->with($data)->with('categorys',$category);
    }

    public function advertisement_update() 
    {
        $data = advertisement::find(Input::get('id'));
        $data->category_id = Input::get('category_id');

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

    public function master_type_add()
    {
        $data = array('data'=>master_type::all());
        return view('/admin/master_type/add')->with($data);
    }

    public function master_type_table() 
    {
        $data = array('data'=>master_type::all());
        return view('admin.master_type.table')->with($data);
    }

    public function master_type_save()
    {

        $data = new master_type;
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_type/table'));
    }

    public function master_type_edit($id) 
    {
        $data = array('data'=>master_type::find($id));
        return view('admin.master_type.edit')->with($data);
    }

    public function master_type_update() 
    {
        $data = master_type::find(Input::get('id'));
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/master_type/table'));
    }

    public function master_type_delete($id)
    {
        master_type::find($id)->delete();
        return redirect()->back();
    }



    //MASTER KIND

    public function type_add()
    {
        $master_type = master_type::all();
        return view('/admin/type/add')->with('master_types',$master_type);
    }

    public function type_table() 
    {
        $data = array('data'=>type::all());
        return view('admin.type.table')->with($data);
    }

    public function type_save()
    {

        $data = new type;
        $data->master_type_id = Input::get('master_type_id');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/type/table'));
    }

    public function type_edit($id) 
    {
        $master_type = master_type::all();
        $data = array('data'=>type::find($id));
        return view('admin.type.edit')->with($data)->with('master_types',$master_type);
    }

    public function type_update() 
    {
        $data = type::find(Input::get('id'));
        $data->master_type_id = Input::get('master_type_id');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/type/table'));
    }

    public function type_delete($id)
    {
        type::find($id)->delete();
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

    public function sub_type_add()
    {
        $master_type = master_type::all();
        $type = type::all();
        return view('/admin/sub_type/add')->with('master_types',$master_type)->with('types',$type);
    }

    public function sub_type_table() 
    {
        $data = array('data'=>sub_type::all());
        return view('admin.sub_type.table')->with($data);
    }

    public function sub_type_save()
    {

        $data = new sub_type;
        $data->master_type_id = Input::get('master_type_id');
        $data->type_id = Input::get('type_id');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/sub_type/table'));
    }

    public function sub_type_edit($id) 
    {
        $master_type = master_type::all();
        $type = type::all();
        $data = array('data'=>sub_type::find($id));
        return view('admin.sub_type.edit')->with($data)->with('master_types',$master_type)->with('types',$type);
    }

    public function sub_type_update() 
    {
        $data = sub_type::find(Input::get('id'));
        $data->master_type_id = Input::get('master_type_id');
        $data->type_id = Input::get('type_id');
        $data->name = Input::get('name');
        $data->save();

        return redirect(url('/sub_type/table'));
    }

    public function sub_type_delete($id)
    {
        sub_type::find($id)->delete();
        return redirect()->back();
    }


    //MASTER PRODUCT

    public function product_add()
    {
        $master_type = master_type::all();
        $type = type::all();
        $sub_type = sub_type::all();
        $master_merk = master_merk::all();
        return view('/admin/product/add')->with('master_types',$master_type)->with('types',$type)->with('sub_types',$sub_type)->with('master_merks', $master_merk);
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
        $data->master_type_id = Input::get('master_type_id');
        $data->type_id = Input::get('type_id');
        $data->sub_type_id = Input::get('sub_type_id');
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
        $master_type = master_type::all();
        $type = type::all();
        $sub_type = sub_type::all();
        $master_merk = master_merk::all();
        $data = array('data'=>product::find($id));
        return view('admin.product.edit')->with($data)->with('master_types',$master_type)->with('types',$type)->with('sub_types',$sub_type)->with('master_merks', $master_merk);
    }

    public function product_update() 
    {
        $data = product::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->master_type_id = Input::get('master_type_id');
        $data->type_id = Input::get('type_id');
        $data->sub_type_id = Input::get('sub_type_id');
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
        $data = array('data'=>order::select('code_order','code_shipping','total','id_user','status','payment','evidence','confirm')->groupBy('code_order','code_shipping','status','id_user','total','payment','evidence','confirm')->orwhere('status','Pending')->orwhere('status','Accepted')->get());
        return view('admin/order/table')->with($data);
        // return $data;
    }

    public function order_sent()
    {
        $data['data'] = order::where('confirm','confirmed')->where('status','Accepted')->orderBy('id','desc')->get();
        return view('admin/order/sent')->with($data);
    }


    public function accept_order(Request $r ,$code_order)
    {
        $select_order = order::where('code_order',$code_order)->update(['status'=>'Accepted']);
        // $order  = order::find($select_order->id);
        // $order->status = 'accepted';
        // $order->save();

        // $r->save()->put('order',  $array);
        return redirect()->back();

    }

    public function sent_order(Request $r ,$code_order)
    {
        $select_order = order::where('code_order',$code_order)->update(['status'=>'Sent']);
        // $order  = order::find($select_order->id);
        // $order->status = 'accepted';
        // $order->save();

        // $r->save()->put('order',  $array);
        return redirect()->back();

    }
    public function done_order(Request $r ,$code_order)
    {
        $select_order = order::where('code_order',$code_order)->update(['status'=>'Done']);
        // $order  = order::find($select_order->id);
        // $order->status = 'accepted';
        // $order->save();

        // $r->save()->put('order',  $array);
        return redirect()->back();

    }

     //ORDER
     public function mail_order_data()
    {
        $data['data'] = order::where('status','Accepted')->get();
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
        $data = array('data'=>order::select('code_order','code_shipping','total','id_user','status','payment','evidence','confirm')->groupBy('code_order','code_shipping','status','id_user','total','payment','evidence','confirm')->where('status','!=','Pending')->get());
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
          $a->Subject = "Confirmation Order Shopiee";
          $a->MsgHTML(  '<h2>'.'Hi '.$id_user.' ,'.'</h2>'.
                        '<h3>'.$code_shipping.'</h3>'.
                        'Please confirmed check your order with an order code '.'<a href="http://shopiee.ga/orders/confirm/">'.'click here'.'</a>'.' and would soon be at your address. For more information, please visit the Help Center or contact our '.'<a href="http://shopiee.ga/contact/">'.'Customer Service.'.'</a>'

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

        //CUSTOMERS
        public function customer_table()
        {
            $data['data'] = User::where('role','member')->get();
            return view('admin/customer/table')->with($data);
        }
        public function customer_edit($id)
        {
            $data = array('data'=>User::find($id));
            return view('admin/customer/edit')->with($data);

        }
        public function customer_update()
        {
            $data = User::find(Input::get('id'));
            $data->name = Input::get('name');
            $data->email = Input::get('email');
            $data->gender = Input::get('gender');



            if(Input::hasFile('pict_user')){
                $pict_user = date('YmdHis')
                .uniqid()
                ."."
                .Input::file('pict_user')->getClientOriginalExtension();

                Input::file('pict_user')->move(storage_path(),$pict_user);
                $data->pict_user = $pict_user;

             }

            $data->save();

            return redirect(url('/customer/table'));
        }
        public function customer_delete($id)
        {
            User::find($id)->delete();
            return redirect()->back();
        }

        //CONTACT
        public function contact_table()
        {
            $data['data'] = contact::all();
            return view('admin/contact/table')->with($data);
        }
        public function contact_edit($id)
        {
            $data = array('data'=>contact::find($id));
            return view('admin/contact/edit')->with($data);

        }
        public function contact_update()
        {
            $data = contact::find(Input::get('id'));
            $data->name = Input::get('name');
            $data->id_user = Input::get('id_user');
            $data->email = Input::get('email');
            $data->subject = Input::get('subject');
            $data->message = Input::get('message');

            $data->save();

            return redirect(url('/contact/table'));
        }
        public function contact_delete($id)
        {
            contact::find($id)->delete();
            return redirect()->back();
        }


        //ADMIN
        public function profile_admin($id)
        {
            $data = array('data'=>User::find($id));
            return view('admin/user_admin/profile')->with($data);

        }
        public function profile_admin_update()
        {
            $data = User::find(Input::get('id'));
            $data->name = Input::get('name');
            $data->email = Input::get('email');
            $data->gender = Input::get('gender');



            if(Input::hasFile('pict_user')){
                $pict_user = date('YmdHis')
                .uniqid()
                ."."
                .Input::file('pict_user')->getClientOriginalExtension();

                Input::file('pict_user')->move(storage_path(),$pict_user);
                $data->pict_user = $pict_user;

             }

            $data->save();

            return redirect(url('/home'));
        }




}
