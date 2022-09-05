<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\CouponController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', 'UserController@index')->name('home');
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');


Route::get('/', 'UserController@index');
// Route::get('/getProductByCategory/{Category}', 'UserController@getProductByCategory');
Route::get('/getProductByCategory', 'UserController@getProductByCategory');

Route::get('/categoryPage/{id}', 'UserController@categoryPage');
Route::get('/SubCategoryPage/{id}', 'UserController@SubCategoryPage');
Route::get('/shop', 'UserController@ShopPage')->name('shop');
Route::post('/filterdata', 'FilterController@filterPage')->name('filter');
Route::post('/filterPriceData', 'FilterController@filterPriceData')->name('filterPriceData');
Route::post('/colorFilter', 'FilterController@colorFilter')->name('colorFilter');
Route::post('/sizeFilter', 'FilterController@sizeFilter')->name('sizeFilter');
Route::get('/shop-search', 'UserController@search');
Route::get('/filter', 'UserController@FilterProduct');
Route::get('/sizecolor/{id}/{pid}', 'UserController@SizeByColor');
Route::post('/sizecolorprice', 'UserController@SizeColorByPrice');
Route::get('/sizecolor', 'UserController@SizeByColors');
// customer details product
Route::get('/detailsProduct/{id}', 'UserController@detailsProduct')->middleware('auth');
Route::get('/contact-us', 'ContactController@getContactPage');
// Route::post('/contact-us', 'ContactController@storeContact');
Route::post('/contact-us', 'ContactController@storeContact')->name('contactPost');
Route::post('/subscribe', 'ContactController@SubscribeStore')->name('subscribe');
// shipping page
// Route::get('/shipping/{id}', 'UserController@shippingPage');

Route::get('/userdashboard', 'UserController@userdashboard')->middleware('auth');
Route::get('/userdashboard/order', 'UserController@userOrder')->middleware('auth');
Route::get('/userdashboard/orderDetails/{id}', 'UserController@userOrderDetails')->name('userOrderDetails')->middleware('auth');

// pdf 
Route::get('/generate-pdf/{id}', 'UserController@generatePDF')->middleware('auth');
Route::get('/view-pdf/{id}', 'UserController@viewPDF')->middleware('auth');
Route::get('/updateusershippingarea', 'UserController@updateusershippingareapage')->middleware('auth');
Route::post('/updateshippingAddress', 'UserController@updateshippingAddress')->middleware('auth');
Route::get('/getpassword', 'UserController@getpassword')->middleware('auth');
Route::post('/changepassword', 'UserController@changepassword')->middleware('auth');
Route::post('/updateuserinfo', 'UserController@updateuserinfo')->middleware('auth');


// category Controller

Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');
Route::get('/allcategory', 'CategoryController@allcategory');
Route::post('/categoryDelete', 'CategoryController@categoryDelete');

Route::get('/catbyproduct', 'CategoryController@catbyproduct');

// change status
Route::post('/categoryStatus','StatusController@categoryStatus');

// subcategory
Route::get('/subcategory', 'SubCategoryController@index');
Route::post('/subcategory', 'SubCategoryController@store');
Route::get('/allsubcategory', 'SubCategoryController@allsubcategory');
Route::post('/subcategoryDelete', 'SubCategoryController@subcategoryDelete');
Route::post('/subcategoryStatus','SubCategoryController@subcategoryStatus');
Route::post('/subCatDetails','SubCategoryController@subCatDetails');
Route::post('/updateSubCat','SubCategoryController@updateSubCat');


// Brand
Route::get('/brands', 'BrandController@index')->middleware('admin');
Route::post('/brands', 'BrandController@store')->middleware('admin');
Route::get('/allbrands', 'BrandController@allbrands');
Route::post('/brandsDelete', 'BrandController@brandsDelete');
Route::post('/brandsStatus','BrandController@brandsStatus');
Route::post('/brandsDetails','BrandController@brandsDetails');
Route::post('/updateBrand','BrandController@updateBrand');


// color
Route::get('/colors', 'ColorController@index');
Route::post('/colors', 'ColorController@store');
Route::get('/allcolors', 'ColorController@allcolors');
Route::post('/colorsDelete', 'ColorController@colorsDelete');
Route::post('/colorsStatus','ColorController@colorsStatus');
Route::post('/colorsDetails','ColorController@colorsDetails');
Route::post('/updateColor','ColorController@updateColor');


// size
Route::get('/size', 'SizeController@index');
Route::post('/size', 'SizeController@store');
Route::get('/allsize', 'SizeController@allsize');
Route::post('/sizeDelete', 'SizeController@sizeDelete');
Route::post('/sizeStatus','SizeController@sizeStatus');
Route::post('/sizeDetails','SizeController@sizeDetails');
Route::post('/updateSize','SizeController@updateSize');

Route::get("addmore","SizeController@addMore");
Route::post("addmore","SizeController@addMorePost");

// units
Route::get('/units', 'UnitController@index');
Route::post('/units', 'UnitController@store');
Route::get('/allunits', 'UnitController@allunits');
Route::post('/unitsDelete', 'UnitController@unitsDelete');
Route::post('/unitsStatus','UnitController@unitsStatus');
Route::post('/unitsDetails','UnitController@unitsDetails');
Route::post('/updateUnit','UnitController@updateUnit');

// Banners
Route::get('/banners', 'BannerController@index')->middleware('admin');
Route::post('/banners', 'BannerController@store')->middleware('admin');
Route::get('/allbanners', 'BannerController@allbanners');
Route::post('/bannersDelete', 'BannerController@bannersDelete');
Route::post('/bannersStatus','BannerController@bannersStatus');
Route::post('/bannersDetails','BannerController@bannersDetails');
Route::post('/updateBanner','BannerController@updateBanner');

// settings route
 // Settings
 Route::get('settings','AdminController@settings')->name('settings')->middleware('admin');
 Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update')->middleware('admin');


// Product Controller

Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');
Route::get('/allproducts', 'ProductController@allproducts');
Route::post('/productDelete', 'ProductController@productDelete');


// Admin Image Gallery
Route::get('upload-images', 'PhotoController@index')->middleware('admin');
Route::post('upload-images-ajax', 'PhotoController@store')->middleware('admin');
Route::get('/getImages', 'PhotoController@getImages')->middleware('admin');
Route::get('/getImages/{id}', 'PhotoController@getImageById')->middleware('admin');
Route::post('/image-delete', 'PhotoController@deleteImage')->middleware('admin');

// Admin Photo Gallery
Route::get('/photos', 'PhotoController@PhotoIndex');

Route::post('/PhotoUpload', 'PhotoController@PhotoUpload');
Route::get('/PhotoJSON', 'PhotoController@PhotoJSON');
Route::get('/PhotoJSONByID/{id}', 'PhotoController@PhotoJSONByID');
Route::post('/PhotoDelete', 'PhotoController@PhotoDelete');


// add to cart
Route::post('/addToCart','CartController@addToCartProduct')->middleware('auth');

// cart page route
Route::get('/shipping-details','UserController@ShippingCartDetailsPage')->middleware('auth');
Route::get('/cartItems','CartController@ShippingCartDetails')->middleware('auth');
Route::post('/cartIncrement','CartController@cartIncrement')->middleware('auth');
Route::post('/cartDecrement','CartController@cartDecrement')->middleware('auth');
Route::post('/cartDelete','CartController@cartDelete')->middleware('auth');
Route::get('/allCartItem','CartController@allCartItem');
Route::get('/subtotal','CartController@subtotal')->middleware('auth');
Route::post('/shippingAddress','CartController@shippingAddress')->middleware('auth');

// admin coupon manage


Route::get('/coupon','CouponController@index');
Route::get('/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
Route::get('/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
Route::post('/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
Route::get('/coupon/delete/{id}',[CouponController::class,'delete']);
Route::get('/coupon/status/{status}/{id}',[CouponController::class,'status']);

// admin order management

Route::get('/allOrders', 'AdminController@allOrdersPage')->middleware('admin');
Route::get('/allOrdersData', 'AdminController@allOrders')->middleware('admin');
Route::post('/OrdersDetails', 'AdminController@OrdersDetails')->middleware('admin');
Route::post('/updateOrderStatus', 'AdminController@updateOrderStatus')->middleware('admin');
Route::get('/adminOrderDetails/{id}', 'AdminController@AdminOrderDetails')->name('userOrderById')->middleware('admin');
Route::post('/OrdersDelete', 'AdminController@AdminOrdersDelete')->middleware('admin');

 // Admin Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification')->middleware('admin');
    Route::get('/notifications','NotificationController@index')->name('all.notification')->middleware('admin');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete')->middleware('admin');

 // User Notification
    Route::get('/usernotification/{id}','NotificationController@usershow')->name('user.notification')->middleware('auth');
    Route::get('/usernotifications','NotificationController@userindex')->name('userall.notification')->middleware('auth');
    Route::delete('/usernotification/{id}','NotificationController@userdelete')->name('usernotification.delete')->middleware('auth');

// admin order pdf invoice 
Route::get('/AdminPdfInvoice/{id}', 'AdminController@AdminPdfInvoiceGenarate')->middleware('admin');
Route::get('/AdminPdfInvoiceView/{id}', 'AdminController@AdminPdfInvoiceViewGenarate')->middleware('admin');

// frontend apply coupon

Route::post('/apply-coupon','CouponController@applyCoupon');



// admin product attribute management
Route::post('/productattr','ProductController@AddProductAttr');


// review route

// Route::post('/review-store',[UserController::class, 'reviewstore'])->name('review.store');
Route::post('/review-store','UserController@reviewstore');


// cart page route

// Route::get('/checkout','UserController@checkoutPage')->middleware('auth');

// Shipping
Route::resource('/shipping','ShippingController');


// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->middleware('auth');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->middleware('auth');

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->middleware('auth');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->middleware('auth');

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->middleware('auth');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->middleware('auth');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->middleware('auth');

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn'])->middleware('auth');
//SSLCOMMERZ END


// Cash on Delivery
Route::post('/cashondelivery', [SslCommerzPaymentController::class, 'cashondelivery'])->middleware('auth');





// file manager

