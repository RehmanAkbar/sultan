<?php

//home page
Route::get('/','homeController@home_page');

//Auth
Route::get('/login_view','homeController@login_view')->name('login.view');
Route::post('/login_user','serviceController@login_user');
Route::get('/logout','homeController@logout');

//user_data
Route::get('/reg_view','homeController@reg_view');
Route::get('/reg_view/{id}','homeController@reg_view_ref');
Route::get('/verify_email/{code}','homeController@verify_email');
Route::get('/referral-points','homeController@referral_points');
Route::post('/reg_new','serviceController@reg_new');
Route::get('/ship_form/{id}','homeController@ship_form')->name('shipForm');
Route::post('/shiping_save','serviceController@shiping_save');
Route::post('/shiping_update','serviceController@shiping_update');
Route::post('/queue_update','serviceController@queue_update');
Route::get('/my_queue','homeController@my_queue');
Route::get('/my_queue_processing','homeController@my_queue_processing');
Route::get('/my_queue_completed','homeController@my_queue_completed');
Route::get('/que_pro_de/{id}','serviceController@que_pro_de');





//




//forget password
Route::get('/forget_view','homeController@forget_view');
Route::post('/forget_password','serviceController@forget_password');

//social login
Route::get('/login_facebook','socialController@redirectToProvider');
Route::get('/callback_facebook','socialController@handleProviderCallback');
Route::get('/login_google','socialController@redirectToProvidergoogle');
Route::get('/callback_google','socialController@handleProviderCallbackgoogle');






Route::get('/subscriptions','homeController@subscriptions');
Route::get('/faq','homeController@faq');
Route::get('/about_us','homeController@about_us');

Route::get('/per_detail','homeController@per_detail')->name('perDetail')->middleware('reset_session');
Route::get('/gift_view','homeController@gift_view');
Route::get('/how_it','homeController@how_it');
Route::get('/women','homeController@women_view');
Route::get('/product_detail/{id}','homeController@product_detail');
Route::get('/model_view/{id}','serviceController@model_view');

Route::get('/get-brand-products','serviceController@get_brand_products');

Route::post('/add_queue','serviceController@add_queue');

Route::post('/add_to_cart','serviceController@addToCart');

Route::post('/remove_from_cart','serviceController@removeFromCart');

Route::get('/cart_checkout','homeController@cartCheckout')->name('cart.checkout');

Route::post('/affiliate_proceed','serviceController@affiliate_proceed');

Route::post('/check_queue','serviceController@checkQueue');

Route::get('/get-queue/img/{id}' , 'serviceController@getQueueImages')->name('q_images');




//Search
Route::get('/brand/{slug}','homeController@brand_filter')->name('brand_filter');


Route::get('/brand_search','homeController@brandSearch')->name('brand_search')->middleware('brand');


Route::get('test/brand_search','homeController@testBrandSearch')->name('brand_search');


//Route::get('/sty_filter/{id}','homeController@sty_filter');
Route::get('/style','homeController@sty_filter')->name('style_filter')->middleware('tag');

Route::get('/occasion/{slug}','homeController@occa_filter')->name('occasion_filter')->middleware('tag:occasion');


Route::get('/tags','homeController@productTag');


//Route::get('/occa_filter/{id}','homeController@occa_filter');

/*Route::get('/gender_filter/men','homeController@searchformen')->middleware('before:men');

Route::get('/gender_filter/women','homeController@searchforwomen')->middleware('before:women');*/

Route::get('/gender_filter/{slug}','homeController@genderSearch')->middleware('before');

Route::get('/create-brand/slug','homeController@brandSlug');




Route::get('/best-sellers','homeController@bestSellers')->name('best_sellers');
Route::get('/new-arrivals','homeController@newArrivals')->name('new_arrivals');
Route::get('/featured','homeController@featured')->name('featured');



//Admin Controller
Route::get('adminpanel', 'Admincontroller@loginview');
Route::post('admin/login_user', 'Admincontroller@loginAdmin');
Route::get('admin/logout' ,'Admincontroller@logout');

//Brand_data

Route::get('/view_panel', 'Admincontroller@view_panel')->name('viewpanel');
Route::post('/insertbrand' , 'Admincontroller@insertBrand');
Route::get('/addBrand' , 'Admincontroller@addBrand');
Route::get('/editBrand/{id}', 'Admincontroller@edit');
Route::post('/brandupdate/{id}', 'Admincontroller@update');
Route::get('/deleteBrand/{id}', 'Admincontroller@destroy');
//Product_data
Route::get('/product' , 'Admincontroller@products');
Route::post('/insertProduct' , 'Admincontroller@insertProducts');
Route::get('/productView', 'Admincontroller@product_view')->name('productView');
Route::get('/editproduct/{id}', 'Admincontroller@editProducts');
Route::post('/productupdate/{id}', 'Admincontroller@updateProducts');
Route::get('/deleteProduct/{id}', 'Admincontroller@destroyProduct');
Route::get('/produ_stock' , 'Admincontroller@produ_stock')->name('produ_stock');
Route::get('/new_stock' , 'Admincontroller@new_stock');
Route::get('/get_product' , 'Admincontroller@get_product');
Route::post('/add_stock' , 'Admincontroller@add_stock');
Route::get('/getstock' , 'Admincontroller@getstock');
Route::get('/pdf/{id}' , 'Admincontroller@pdf');
Route::get('/invoice_email/{id}' , 'Admincontroller@invoice_email');


//User_data
Route::get('/userView', 'Admincontroller@user_view')->name('userView');
Route::get('/user_que/{id}', 'Admincontroller@user_que');
Route::get('/chang_status/{id}', 'Admincontroller@chang_status');
Route::get('/user_delete/{id}', 'Admincontroller@user_delete');
Route::get('/que_delete/{id}', 'Admincontroller@que_delete');

//Tag_data
Route::get('/tag' , 'Admincontroller@tag');
Route::post('/insertTag' , 'Admincontroller@insertTag');
Route::get('/tagView' , 'Admincontroller@tagView');
Route::get('/editTag/{id}' , 'Admincontroller@editTag');
Route::post('/updateTags/{id}', 'Admincontroller@updateTags');
Route::get('/deletetags/{id}', 'Admincontroller@destroyTags');


//Dashbord
Route::get('/dashbord', 'Admincontroller@dashbordView')->name('dashbord');
Route::get('/queueOrder/{id}', 'Admincontroller@queueorders');
Route::get('/queueOrder-specific/{id}', 'Admincontroller@queueorders_sepc');

Route::get('/editQueueOrder/{id}' , 'Admincontroller@editQueorders');
Route::get('/completed-orders/{id}' , 'Admincontroller@completedOrders');

Route::post('/updtequeodr/{id}', 'Admincontroller@updteQueOdr');
//Order
Route::get('/orderViewQue', 'Admincontroller@order_view');
Route::get('/order_view_completed', 'Admincontroller@order_view_completed');

Route::get('/editOrderQue/{id}', 'Admincontroller@eidtOrderQue');
Route::get('/editOrderQuePrint/{id}', 'Admincontroller@editOrderQuePrint');
Route::post('/updateStatus/{id}', 'Admincontroller@updateStatus');
Route::get('/expiredSubscription', 'Admincontroller@expired_subscription');















