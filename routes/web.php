<?php
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('checkrole', function(Request $request){
// 	if (Auth::user()->role== 'admin') {
//         return redirect('/home');
//     }else{
//         return redirect('/');
//     }
// });

// Route::get('test',function(){
// 	dd(session('cart'));
// });
Route::get('/', 'WelcomeController@index');

Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');


	Route::get('attach/roles','TestController@attachRole');
	Route::get('roles','TestController@roles');

Route::get('/pict/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
});

Route::get('/pict_ad/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
});
Route::get('/pict_product1/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
	});
Route::get('/pict_product2/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
	});
Route::get('/evidence/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
	});
Route::get('/pict_user/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
	});



// Route::group(['middleware'=>'role:member'],function(){

	// Route::get('/home', 'HomeController@index')->middleware('CheckRole');




	Route::post('uploadimagedrag', 'ImageController@uploadDragAndDropCKEDITOR');
	Route::post('uploadimagefilebrowser', 'ImageController@uploadFileBrowserCKEDITOR');

	// Route::get('/', function(Request $req){
	// 	return session('cart');
	// });







	Route::post('/savecart','WelcomeController@save_cart');
	Route::get('/cart','WelcomeController@cart');
	Route::get('/carts','WelcomeController@carts');
	Route::get('hapuscart/{id}', function(Request $r, $id){
		$array = session('cart');
		unset($array[$id]);
		session(['cart' => $array]);
		return redirect()->back();
	});
	Route::get('/hapuscart', function(Request $request){
	return session()->forget('cart');
	// return redirect(url('ui.cart'));
	});
	Route::post('updatecart/{id}', 'WelcomeController@updatecart');



	// Route::get('/register/member', 'Auth/RegisterController@index');
	// Route::post('/register', 'Auth/RegisterController@register');





	Route::get('/contact', 'WelcomeController@contact');
	Route::post('/contact/us/', 'WelcomeController@contact_save');

	Route::get('/text', 'WelcomeController@text');
	Route::get('/faq', 'WelcomeController@faq');


	Route::get('/articles', 'WelcomeController@articles');
	Route::get('articles/{category_id}/{slug}', 'WelcomeController@articles_detail');
	Route::get('article/category/{category_id}','WelcomeController@articles_category');



	Route::get('/products/{slug}','WelcomeController@product_detail');

	Route::get('/checkout/address','WelcomeController@checkout_address');
	Route::get('/checkout/address/edit/{id}','WelcomeController@checkout_address_edit');
	Route::post('/checkout/address/save','WelcomeController@checkout_address_save');
	Route::get('/checkout/delivery/{id}','WelcomeController@checkout_delivery');
	Route::post('/checkout/delivery/save','WelcomeController@checkout_delivery_save');
	Route::get('/checkout/payment/{id}','WelcomeController@checkout_payment');
	Route::post('/checkout/payment/save','WelcomeController@checkout_payment_save');
	Route::get('/checkout/order/','WelcomeController@checkout_order');
	Route::post('updatecartorder/{id}', 'WelcomeController@updatecartorder');
	Route::post('/checkout/order/save','WelcomeController@checkout_order_save');
	Route::get('/checkout/order_review','WelcomeController@checkout_order_review');

	Route::post('/update/member','WelcomeController@update_member');


	Route::get('/orders/confirm/','WelcomeController@orders_confirm');
	Route::get('/orders/history/confirm/','SearchController@search_code_order');
	Route::get('/orders/history/user/{id_user}','WelcomeController@orders_history');
	Route::get('/orders/history/{code_order}','WelcomeController@orders_history_detail');
	Route::get('/orders/detail/confirm/{code_shipping}','WelcomeController@orders_confirm_detail');
	Route::post('/confirmed/order/{code_shipping}','WelcomeController@confirmed_order');



	Route::post('/payment/evidence/{code_order}','WelcomeController@evidence');
	Route::get('/orders','WelcomeController@orders');

	Route::get('/user/account/{id}','WelcomeController@user_account');

	Route::get('brand/{name}','ProductController@brand');
	Route::get('category/{master_type_name}/{type_name}/{sub_type_name}','ProductController@category_type');
	Route::get('category/{master_type_name}','ProductController@category_parent');
	Route::get('category/{master_type_name}/{type_name}','ProductController@category_kind');



	Route::get('search','SearchController@search');
// });

Route::group(['middleware'=>'role:admin'],function(){

	Route::get('/home', 'HomeController@index');

	//ADMIN
	Route::get('/admin/profile/{id}','HomeController@profile_admin');
	Route::post('/admin/profile/update','HomeController@profile_admin_update');


	//ADVERTISEMENT

	Route::get('/advertisement/add', 'HomeController@advertisement_add');
	Route::post('/advertisement/save', 'HomeController@advertisement_save');
	Route::get('/advertisement/table', 'HomeController@advertisement_table');
	Route::get('/advertisement/edit/{id}','HomeController@advertisement_edit');
	Route::post('/advertisement/update','HomeController@advertisement_update');
	Route::get('/advertisement/delete/{id}','HomeController@advertisement_delete');



	//BLOG

	Route::get('/article/add', 'HomeController@article_add');
	Route::post('/article/save', 'HomeController@article_save');
	Route::get('/article/table', 'HomeController@article_table');
	Route::get('/article/edit/{id}','HomeController@article_edit');
	Route::post('/article/update','HomeController@article_update');
	Route::get('/article/delete/{id}','HomeController@article_delete');




	//CATEGORY

	Route::get('/master_category/add', 'HomeController@master_category_add');
	Route::get('/master_category/table', 'HomeController@master_category_table');
	Route::post('/master_category/save', 'HomeController@master_category_save');
	Route::get('/master_category/edit/{id}','HomeController@master_category_edit');
	Route::post('/master_category/update','HomeController@master_category_update');
	Route::get('/master_category/delete/{id}','HomeController@master_category_delete');


	//MASTER MERK

	Route::get('/master_merk/add', 'HomeController@master_merk_add');
	Route::get('/master_merk/table', 'HomeController@master_merk_table');
	Route::post('/master_merk/save', 'HomeController@master_merk_save');
	Route::get('/master_merk/edit/{id}','HomeController@master_merk_edit');
	Route::post('/master_merk/update','HomeController@master_merk_update');
	Route::get('/master_merk/delete/{id}','HomeController@master_merk_delete');



	//MASTER PARENT

	Route::get('/master_type/add', 'HomeController@master_type_add');
	Route::get('/master_type/table', 'HomeController@master_type_table');
	Route::post('/master_type/save', 'HomeController@master_type_save');
	Route::get('/master_type/edit/{id}','HomeController@master_type_edit');
	Route::post('/master_type/update','HomeController@master_type_update');
	Route::get('/master_type/delete/{id}','HomeController@master_type_delete');


	//MASTER KIND

	Route::get('/type/add', 'HomeController@type_add');
	Route::get('/type/table', 'HomeController@type_table');
	Route::post('/type/save', 'HomeController@type_save');
	Route::get('/type/edit/{id}','HomeController@type_edit');
	Route::post('/type/update','HomeController@type_update');
	Route::get('/type/delete/{id}','HomeController@type_delete');


	//MASTER TYPE

	Route::get('/sub_type/add', 'HomeController@sub_type_add');
	Route::get('/sub_type/table', 'HomeController@sub_type_table');
	Route::post('/sub_type/save', 'HomeController@sub_type_save');
	Route::get('/sub_type/edit/{id}','HomeController@sub_type_edit');
	Route::post('/sub_type/update','HomeController@sub_type_update');
	Route::get('/sub_type/delete/{id}','HomeController@sub_type_delete');


	//MASTER PRODUCT

	Route::get('/product/add', 'HomeController@product_add');
	Route::get('/product/table', 'HomeController@product_table');
	Route::post('/product/save', 'HomeController@product_save');
	Route::get('/product/edit/{id}','HomeController@product_edit');
	Route::post('/product/update','HomeController@product_update');
	Route::get('/product/delete/{id}','HomeController@product_delete');

	//ORDER
	Route::get('/order/table','HomeController@order_table');
	Route::post('/accept/{code_order}','HomeController@accept_order');
	Route::post('/sent/{code_order}','HomeController@sent_order');
	Route::get('/order/mail/{code_order}','HomeController@mail_order');
	Route::get('/order/mail','HomeController@mail_order_data');
	Route::get('/order/sent','HomeController@order_sent');
	Route::get('/order/all','HomeController@order_all');
	Route::post('/done/{code_order}','HomeController@done_order');
	Route::post('/email/send/{code_order}', 'HomeController@send_mail');

	//CUSTOMERS
	Route::get('/customer/table/','HomeController@customer_table');
	Route::get('/customer/edit/{id}','HomeController@customer_edit');
	Route::post('/customer/update','HomeController@customer_update');
	Route::get('/customer/delete/{id}','HomeController@customer_delete');

	//CONTACT

	Route::get('/contact/table/','HomeController@contact_table');
	Route::get('/contact/edit/{id}','HomeController@contact_edit');
	Route::post('/contact/update','HomeController@contact_update');
	Route::get('/contact/delete/{id}','HomeController@contact_delete');


	
});
