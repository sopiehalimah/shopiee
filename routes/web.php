<?php

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



// Route::group(['middleware'=>'role:member'],function(){

	// Route::get('/home', 'HomeController@index')->middleware('CheckRole');


	Route::get('attach/roles','TestController@attachRole');
	Route::get('roles','TestController@roles');


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
	Route::get('/text', 'WelcomeController@text');
	Route::get('/faq', 'WelcomeController@faq');


	Route::get('/blogs', 'WelcomeController@blogs');
	Route::get('blogs/{slug}', 'WelcomeController@blogs_detail');


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

	Route::get('/orders/history','WelcomeController@orders_history');


	Route::get('OBLONG','ProductController@OBLONG');
	Route::get('SHOES','ProductController@SHOES');

	Route::get('SPORT','ProductController@SPORT');
	Route::get('T-SHIRT','ProductController@T-SHIRT');

	Route::get('MAN','ProductController@MAN');

	Route::get('search','SearchController@search');
// });

Route::group(['middleware'=>'role:admin'],function(){

	Route::get('/home', 'HomeController@index');

	//ADVERTISEMENT

	Route::get('/advertisement/add', 'HomeController@advertisement_add');
	Route::post('/advertisement/save', 'HomeController@advertisement_save');
	Route::get('/advertisement/table', 'HomeController@advertisement_table');
	Route::get('/advertisement/edit/{id}','HomeController@advertisement_edit');
	Route::post('/advertisement/update','HomeController@advertisement_update');
	Route::get('/advertisement/delete/{id}','HomeController@advertisement_delete');

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


	//BLOG

	Route::get('/blog/add', 'HomeController@blog_add');
	Route::post('/blog/save', 'HomeController@blog_save');
	Route::get('/blog/table', 'HomeController@blog_table');
	Route::get('/blog/edit/{id}','HomeController@blog_edit');
	Route::post('/blog/update','HomeController@blog_update');
	Route::get('/blog/delete/{id}','HomeController@blog_delete');

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


	//MASTER BLOG

	Route::get('/master_blog/add', 'HomeController@master_blog_add');
	Route::get('/master_blog/table', 'HomeController@master_blog_table');
	Route::post('/master_blog/save', 'HomeController@master_blog_save');
	Route::get('/master_blog/edit/{id}','HomeController@master_blog_edit');
	Route::post('/master_blog/update','HomeController@master_blog_update');
	Route::get('/master_blog/delete/{id}','HomeController@master_blog_delete');


	//MASTER MERK

	Route::get('/master_merk/add', 'HomeController@master_merk_add');
	Route::get('/master_merk/table', 'HomeController@master_merk_table');
	Route::post('/master_merk/save', 'HomeController@master_merk_save');
	Route::get('/master_merk/edit/{id}','HomeController@master_merk_edit');
	Route::post('/master_merk/update','HomeController@master_merk_update');
	Route::get('/master_merk/delete/{id}','HomeController@master_merk_delete');



	//MASTER PARENT

	Route::get('/master_parent/add', 'HomeController@master_parent_add');
	Route::get('/master_parent/table', 'HomeController@master_parent_table');
	Route::post('/master_parent/save', 'HomeController@master_parent_save');
	Route::get('/master_parent/edit/{id}','HomeController@master_parent_edit');
	Route::post('/master_parent/update','HomeController@master_parent_update');
	Route::get('/master_parent/delete/{id}','HomeController@master_parent_delete');


	//MASTER KIND

	Route::get('/master_kind/add', 'HomeController@master_kind_add');
	Route::get('/master_kind/table', 'HomeController@master_kind_table');
	Route::post('/master_kind/save', 'HomeController@master_kind_save');
	Route::get('/master_kind/edit/{id}','HomeController@master_kind_edit');
	Route::post('/master_kind/update','HomeController@master_kind_update');
	Route::get('/master_kind/delete/{id}','HomeController@master_kind_delete');


	//MASTER TYPE

	Route::get('/master_type/add', 'HomeController@master_type_add');
	Route::get('/master_type/table', 'HomeController@master_type_table');
	Route::post('/master_type/save', 'HomeController@master_type_save');
	Route::get('/master_type/edit/{id}','HomeController@master_type_edit');
	Route::post('/master_type/update','HomeController@master_type_update');
	Route::get('/master_type/delete/{id}','HomeController@master_type_delete');


	//MASTER PRODUCT

	Route::get('/product/add', 'HomeController@product_add');
	Route::get('/product/table', 'HomeController@product_table');
	Route::post('/product/save', 'HomeController@product_save');
	Route::get('/product/edit/{id}','HomeController@product_edit');
	Route::post('/product/update','HomeController@product_update');
	Route::get('/product/delete/{id}','HomeController@product_delete');
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

	Route::get('/order/table','HomeController@order_table');
});