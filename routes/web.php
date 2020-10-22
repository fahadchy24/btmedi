<?php

use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route; 

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

/* Frontend Controller */
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/faq', 'PagesController@faq')->name('faq');

Route::get('/test', 'FrontendController@test');

/* Get Subsciber fron Frontend */
Route::post('/subscribe','FrontendController@subscribe')->name('subscribe.submit');

Route::get('/category/{id}', 'FrontendController@category')->name('category');
Route::get('/subcategory/{id}', 'FrontendController@subcategory')->name('subcategory');

// Display All Products
Route::get('/products', 'FrontendController@getAllProducts')->name('product');
// Display All Featured Products
Route::get('/products/featured', 'FrontendController@getAllFeaturedProducts')->name('featuredproduct');

/* Display Other page & CMS Page in Frontend */
Route::match(['get', 'post'], '/page/{url}', 'PagesController@OtherPage');

// Show Single Product Detail Pages in Frontend=======================================================
Route::get('product/view/{id}', 'FrontendController@productDetailsByID');

// Product Reviews by User
Route::post('product/review/save/{id}', 'CommentController@productReview')->name('save.product.review');

// Shipping Methods
// Route::get('frontend/orders/shipping', 'FrontendController@FrontshippingMethod');

// Send Invoice Email to Customer after orders
// Route::get('/send-mail', function () {
// 	$details = [
// 		'title' => 'Mail From BTCare Supply',
// 		'body' => 'This is from testing.'
// 	];
// 	\Mail::to($request->user())->send(new MailableClass);
// });

// =================== All the Admin Routes will be defined here =================== //
Route::get('/admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Admin\LoginController@login');

Route::prefix('/admin')->middleware('admin')->group(function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');


	// =============== Orders Routes for Admin =============== \\
	Route::get('orders/create', 'OrderController@createNewOrder')->name('create.new.orders');
	Route::post('orders/save', 'OrderController@storeCustomOrder')->name('store.new.orders');
	Route::get('orders/new', 'OrderController@newOrders')->name('new.orders');
	Route::get('orders/processing', 'OrderController@ordersProcessing')->name('orders.processing');
	Route::get('orders/ready', 'OrderController@ordersReady')->name('orders.ready');
	Route::get('orders/finished', 'OrderController@finishedOrders')->name('finished.orders');
	Route::get('orders/back', 'OrderController@backOrders')->name('back.orders');
	Route::get('orders/canceled', 'OrderController@canceledOrders')->name('canceled.orders');
	Route::get('orders/hold', 'OrderController@holdOrders')->name('hold.orders');
	Route::get('orders/refund', 'OrderController@refundOrders')->name('refund.orders');
	Route::get('orders/wholesale', 'OrderController@wholesaleOrders')->name('wholesale.orders');
	Route::get('orders/view/{id}', 'OrderController@viewOrders')->name('view.order');
	Route::get('orders/edit/{id}', 'OrderController@editOrder')->name('edit.order');
	Route::post('orders/update/{id}', 'OrderController@updateOrder')->name('update.order');
	Route::get('orders/delete/{id}', 'OrderController@deleteOrder')->name('delete.order');
	Route::post('orders/paid-unpaid/{id}', 'OrderController@PaidUnpaidOrder')->name('paid_unpaid.order');

	// Shipping Methods Setup
	Route::resource('orders/shipping-methods', 'ShippingMethodController');


	// =============== Products Routes for Admin =============== \\
	Route::get('products', 'ProductController@index')->name('product.index');
	Route::get('products/create', 'ProductController@create')->name('product.create');
	Route::post('products/save', 'ProductController@store')->name('product.save');
	Route::get('products/edit/{id}', 'ProductController@edit')->name('product.edit');
	Route::post('products/update/{id}', 'ProductController@update')->name('product.update');
	Route::get('products/delete/{id}', 'ProductController@destroy');
	Route::get('products/view/{id}', 'ProductController@show');
	Route::get('product/status/{id}/{status}', 'ProductController@status')->name('product-status');

    // ================ Product Import By Excel sheet =========== \\
	Route::post('product/import', 'ProductController@import')->name('product.import');
    // ================ Product Export By Excel sheet =========== \\
	Route::get('products/export', 'ProductController@export')->name('product.export');

	// Products Brand Routes------------------------
	Route::get('product/brands', 'BrandController@index')->name('brand.index');
	Route::get('product/brands/create', 'BrandController@create')->name('brand.create');
	Route::post('product/brands/save', 'BrandController@store')->name('brand.save');
	Route::get('product/brands/edit/{id}', 'BrandController@edit')->name('brand.edit');
	Route::post('product/brands/update/{id}', 'BrandController@update')->name('brand.update');
	Route::get('product/brands/delete/{id}', 'BrandController@destroy')->name('brand.delete');
	Route::get('product/brands/status/{id}/{status}', 'BrandController@status')->name('brand.status');

	// =============== Testing Product Attributes Routes for Admin =============== \\
	Route::match(['get', 'post'], 'products/add-attributes/{id}', 'ProductController@addAttributes')->name('product-attribute-store');
	Route::get('products/added-attributes/destroy/{id}', 'ProductController@DeleteAddedAttribute')->name('product-attribute-destroy');

	// =============== Attributes Routes for Admin =============== \\
	Route::get('product/attributes', 'AttributeController@index')->name('product-attributes');
	Route::get('product/attributes/add', 'AttributeController@create')->name('product-attributes-add');
	Route::post('product/attributes/save', 'AttributeController@store')->name('product-attributes-store');

	// Add Color Attribute
	Route::post('product/attribute/color/save', 'AttributeController@colorStore')->name('attribute.color.store');
	Route::get('product/attribute/color/destroy/{id}', 'AttributeController@colorDestroy')->name('attribute.color.destroy');
	// Add Size Attribute
	Route::post('product/attribute/size/save', 'AttributeController@sizeStore')->name('attribute.size.store');
	Route::get('product/attribute/size/destroy/{id}', 'AttributeController@sizeDestroy')->name('attribute.size.destroy');
	// Add Other Attribute
	Route::post('product/attribute/other/save', 'AttributeController@otherStore')->name('attribute.other.store');
	Route::get('product/attribute/other/destroy/{id}', 'AttributeController@otherDestroy')->name('attribute.other.destroy');

	// Price Level Setup
	Route::post('product/attribute/other/save', 'AttributeController@otherStore')->name('attribute.other.store');
	Route::get('product/attribute/other/destroy/{id}', 'AttributeController@otherDestroy')->name('attribute.other.destroy');





	// =============== Categories Routes for Admin =============== \\
	/* Category Routes */
	Route::match(['get', 'post'], 'category', 'CategoryController@index')->name('all-category'); 
	Route::get('category/edit/{id}', 'CategoryController@edit')->name('edit-category');
	Route::post('category/update/{id}', 'CategoryController@update')->name('update-category');
	Route::get('category/delete/{id}', 'CategoryController@destroy')->name('delete-category');

	Route::get('category/check-slug', 'CategoryController@checkSlug')->name('check.category.slug');

	/* SubCategory Routes */
	Route::match(['get', 'post'], 'subcategory', 'SubCategoryController@index')->name('sub.category');
	Route::get('subcategory/edit/{id}', 'SubCategoryController@edit')->name('edit-subcategory');
	Route::post('subcategory/update/{id}', 'SubCategoryController@update')->name('update-subcategory');
	Route::get('subcategory/delete/{id}', 'SubCategoryController@destroy')->name('delete-subcategory');

	Route::get('subcategory/check-slug', 'SubCategoryController@checkSlug')->name('check.subcategory.slug');

	// =============== Customer Routes for Admin =============== \\
	Route::get('customers', 'CustomerController@index')->name('customer.index');
	Route::get('customers/create', 'CustomerController@create')->name('customer.create');
	Route::post('customers/save', 'CustomerController@store')->name('customer.store');
	Route::get('customer/view/{id}', 'CustomerController@show')->name('customer.show');
	Route::get('customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
	Route::post('customer/update/{id}', 'CustomerController@update')->name('customer.update');
	Route::get('customer/delete/{id}', 'CustomerController@destroy')->name('customer.delete');
	
	// =============== Inventory Routes for Admin =============== \\
	Route::get('inventory', 'InventoryController@index')->name('inventory.index');
	// ================ Product Import By Excel sheet =========== \\
	Route::post('inventory/import', 'ProductReceiveController@import')->name('inventory.import');
	/* Vendor Routes */
	Route::resource('vendor', 'VendorController');
	/* Product Receieving Input */
	Route::resource('product-receive', 'ProductReceiveController');
	Route::get('product/receive/autocomplete','ProductReceiveController@getAutocompleteData');
	
 	Route::post('tabledit/action', 'InventoryController@action')->name('tabledit.action');


	// =============== RMA Routes for Admin =============== \\
	Route::get('rma', 'RMAController@index')->name('rma.index');
	Route::post('rma/save', 'RMAController@store')->name('rma.save');
	Route::get('rma/edit/{id}', 'RMAController@edit')->name('rma.edit');
	Route::POST('rma/update/{id}', 'RMAController@update')->name('rma.update');
	Route::get('rma/delete/{id}', 'RMAController@destroy')->name('rma.delete');
	Route::get('waiting-for-approval-rma', 'RMAController@waiting')->name('waiting.rma');
	Route::get('completed-rma', 'RMAController@completed')->name('completed.rma');
	Route::get('canceled-rma', 'RMAController@canceled')->name('canceled.rma');
	Route::post('rma/complete/{id}', 'RMAController@completeRMA')->name('complete.rma');

	// =============== Call Logs Routes for Admin =============== \\
	Route::get('call-log', 'CallLogController@index')->name('call-log');
	Route::get('call-log/create', 'CallLogController@create')->name('call-log-add');
	Route::post('call-log/save', 'CallLogController@store')->name('call-log-store');
	Route::get('call-log/edit/{id}', 'CallLogController@edit');
	Route::POST('call-log/update/{id}', 'CallLogController@update')->name('call-log-update');
	Route::get('call-log/delete/{id}', 'CallLogController@destroy');

	// =============== Report Routes for Admin =============== \\
	Route::get('report/sales-report', 'ReportController@saleReport')->name('sale-report');

	// =============== Comments Routes for Admin =============== \\
	Route::get('comment/all-comment', 'CommentController@index')->name('comment.index');
	Route::get('comment/view/{id}', 'CommentController@show')->name('comment.view');
	Route::get('comment/delete/{id}', 'CommentController@destroy')->name('comment.delete');
	Route::get('comment/status/{id}/{status}', 'CommentController@status')->name('comment.status');




	// =============== Coupon Routes for Admin =============== \\
	Route::resource('coupons', 'CouponController');
	// Route::get('customers/create', 'CustomerController@create')->name('customer.create');
	// Route::post('customers/save', 'CustomerController@store')->name('customer.store');
	// Route::get('customer/view/{id}', 'CustomerController@show');
	// Route::get('customer/delete/{id}', 'CustomerController@destroy');


    /*------------------- Admins/Sub Admins Roles ------------------- */
	Route::match(['get', 'post'], 'manage-role', 'AdminController@manageRoles')->name('manage.role');

	/*------------------- Subscriber Routes for Admin ------------------- */
	Route::get('subscribers', 'SubscriberController@index')->name('subscriber.index');


    /*------------------- Web Settings  ------------------- */

    // =============== General Settings for Admin =============== \\

	// Logo Settings
	Route::match(['get', 'post'], 'general-settings/logo', 'GeneralSettingController@logo')->name('main-logo');

    // Top Header
    Route::match(['get', 'post'], 'general-settings/top-header', 'GeneralSettingController@topHeader')->name('top-header');
    // Address
    Route::match(['get', 'post'], 'general-settings/address', 'GeneralSettingController@address')->name('office-address');

	// Other Page
    Route::match(['get', 'post'], 'other-page', 'OtherPageController@index')->name('other-page');
    Route::get('other-page/edit/{id}', 'OtherPageController@edit')->name('edit-other-page');
	Route::post('other-page/update/{id}', 'OtherPageController@update')->name('update-other-page');
	Route::get('other-page/delete/{id}', 'OtherPageController@destroy')->name('delete-other-page');

	// Popup Banner Settings
	Route::match(['get', 'post'], 'general-settings/popup-banner', 'GeneralSettingController@PopupBanner')->name('popup-banner');

	// Social Links Settings
	Route::match(['get', 'post'], 'social-links', 'SocialSettingController@socialLinks')->name('social-links');

	// Website Bottom Footer Text
    Route::match(['get', 'post'], 'website-footer', 'GeneralSettingController@webfooter')->name('website-footer');

	// Menu ======================================================================
	Route::resource('allmenu/menu', 'MenuController');
	Route::get('allmenu/menu/edit/{id}', 'MenuController@edit')->name('edit-menu');
	Route::post('allmenu/menu/update/{id}', 'MenuController@update')->name('update-menu');
	Route::get('allmenu/menu/delete/{id}', 'MenuController@destroy')->name('menu.destroy');

	// =============== Homepage Settings for Admin =============== \\

	// Slider
	Route::match(['get', 'post'], 'websettings/homepagesettings/slider', 'SliderController@index')->name('admin.slider');
	Route::get('websettings/homepagesettings/slider/delete/{id}', 'SliderController@destroy')->name('slider.destroy');

	// Banner
	Route::match(['get', 'post'], 'websettings/homepagesettings/banner', 'AdBannerController@index')->name('ad-banner');


});

// User Routes=======================================================
Route::match(['get', 'post'], 'user/register', 'Auth\RegisterController@registration')->name('user.register');

// Route::match(['get','post'], 'user/login', 'Auth\LoginController@login')->name('user.login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('user/logout', 'Auth\LoginController@logout')->name('user.logout');
Route::match(['get', 'post'], 'my-account/{id}', 'UserController@account')->name('my.account');
// Route::post('/update-userinfo', 'UserController@updateUserInfo');
Route::get('order/view/{id}', 'UserController@viewOrder')->name('order.history');
// Route::post('order-again', 'UserController@orderAgain');

// // Wishlist
Route::get('wishlist/{id}', 'UserController@showWishlist')->name('wish.list');
Route::post('add-to-wishlist', 'UserController@add_to_wishlist')->name('add-to-wishlist');
// Route::post('wishlist-to-cart', 'UserController@wishlist_to_cart');


// Cart
Route::post('cart/add', 'CartController@add_to_cart');
Route::get('cart/show', 'CartController@show_cart')->name('show.cart');
Route::get('cart/delete/{rowId}', 'CartController@delete_cart');
Route::post('cart/update', 'CartController@update_cart');
Route::get('checkout', 'CartController@checkout')->name('order.checkout');
Route::post('/place-order', 'OrderController@storeOrder')->name('store.order');

// // Apply a coupon
// Route::post('apply-coupon', 'CartController@apply_coupon')->name('apply-coupon');

Route::get('cookies', 'CookiesController@setCookie');
Route::get('cookies/get', 'CookiesController@getCookie');
