<?php

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

//Front
use Illuminate\Support\Facades\Artisan;

Route::group(['namespace'=>'front','middleware'=>'domain'],function() {

    Route::get('/','HomeController@index')->name('home');
    Route::get('/contact','ContactController@index')->name('contact');
    Route::post('/contact-store','ContactController@store')->name('contact.store');
    Route::get('/about','AboutController@index')->name('about');
    Route::get('/delivery','DeliveryController@index')->name('delivery');

    Route::get('/login','AuthController@loginForm')->name('login')->middleware('guest');
    Route::post('/login','AuthController@login')->name('login')->middleware('guest');
    Route::get('/register','AuthController@registerForm')->name('register')->middleware('guest');
    Route::post('/register','AuthController@register')->name('register')->middleware('guest');
    Route::get('/activation/{activation}','AuthController@activation')->name('activation')->middleware('guest');
    Route::get('/reset-password','AuthController@resetPasswordForm')->name('reset-password')->middleware('guest');
    Route::post('/reset-password','AuthController@resetPassword')->name('reset-password')->middleware('guest');
    Route::get('/reset-password/{token}','AuthController@resetPasswordTokenForm')->name('reset-password-token')->middleware('guest');
    Route::post('/reset-password/{token}','AuthController@resetPasswordToken')->name('reset-password-token')->middleware('guest');
    Route::get('/my-account','AuthController@index')->name('my-account')->middleware('auth');
    Route::get('/logout','AuthController@logout')->name('logout')->middleware('auth');
    Route::post('/account-detail-changes','AuthController@accountDetailChanges')->name('account-detail-changes')->middleware('auth');
    Route::post('/account-changes','AuthController@accountChanges')->name('account-changes')->middleware('auth');

    Route::group(['prefix'=>'order'],function () {
        Route::get('/detail/{id}','OrderController@detail')->name('order-detail')->middleware('auth');
        Route::get('/invoice/{id}','OrderController@invoice')->name('invoice')->middleware('auth');
        Route::get('/invoice-generate-pdf/{id}','OrderController@invoiceGeneratePdf')->name('invoiceGeneratePdf')->middleware('auth');
    });


    Route::post('/add-to-cart','BasketController@addToCart')->name('addToCart');
    Route::get('/add-to-cart-by-id/{id}','BasketController@addToCartById')->name('addToCartById');
    Route::get('/remove-from-cart-by-id/{id}','BasketController@removeFromCartById')->name('removeFromCartById');
    Route::post('/add-to-cart-with-qty','BasketController@addToCartWithQty')->name('addToCartWithQty');
    Route::post('/remove-from-cart','BasketController@removeFromCart')->name('removeFromCart');
    Route::get('/remove-from-cart-by-row-id/{rowId}','BasketController@removeFromCartByRowId')->name('removeFromCartByRowId');
    Route::get('/cart','BasketController@index')->name('cart');
    Route::post('/update-cart-as-count-by-row-id','BasketController@updateCartAsCountByRowId')->name('updateCartAsCountByRowId');

    Route::post('/add-to-wishlist','WishlistController@addToWishlist')->name('addToWishlist');
    Route::post('/remove-from-wishlist','WishlistController@removeFromWishlist')->name('removeFromWishlist');
    Route::get('/remove-from-wishlist-by-id/{id}','WishlistController@removeFromWishlistById')->name('removeFromWishlistById');
    Route::get('/wishlist','WishlistController@index')->name('wishlist');

    Route::post('/add-to-compare','CompareController@addToCompare')->name('addToCompare');
    Route::post('/remove-from-compare','CompareController@removeFromCompare')->name('removeFromCompare');
    Route::get('/remove-from-compare-by-id/{id}','CompareController@removeFromCompareById')->name('removeFromCompareById');
    Route::get('/compare','CompareController@index')->name('compare');

    Route::post('/subscribe','SubscribeController@store')->name('subscribe');
    Route::get('/checkout','CheckoutController@checkoutForm')->name('checkout')->middleware(['auth','check.empty.cart']);
    Route::post('/checkout','CheckoutController@checkout')->name('checkout')->middleware(['auth','check.empty.cart']);

    Route::get('/kabel-mehsullari','DomainController@index')->name('kabel');
    Route::get('/isiqlandirma','DomainController@index')->name('lamp');
    Route::get('/muhafize-cihazlari','DomainController@index')->name('protected.device');
    Route::get('/kabel-aksesuarlari','DomainController@index')->name('kabel.aksesuar');
    Route::get('/skaflar-qutular-aksesuarlar','DomainController@index')->name('skaf');
    Route::get('/elektrik-aletleri','DomainController@index')->name('elektrik');
    Route::post('/rating','DomainController@rating')->name('rating');
    Route::post('/get-modal-data','DomainController@getModalData')->name('modal.data');
    Route::get('/category/{parentSlug}/{childSlug?}','CategoryController@index')->name('category');
    Route::get('/category','CategoryController@catalog')->name('catalog');
    Route::get('/filter-by','CategoryController@filterBy')->name('filterBy');
    Route::get('/product/{slug}','ProductController@detail')->name('product.detail');
    Route::get('/search','ProductController@search')->name('product.search');
    Route::get('/search','ProductController@search')->name('product.search');

});

//Back
Route::group(['prefix'=>'admin','namespace'=>'back'],function () {

    Route::redirect('/','/admin/login');
    Route::get('/login','AuthController@index')->name('admin.login');
    Route::post('/login','AuthController@login')->name('admin.login');
    Route::get('/logout','AuthController@logout')->name('admin.logout');

    Route::group(['middleware'=>['admin','history']],function () {
        Route::get('/','HomeController@index')->name('admin');

        // CategoryController with resource
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@index')->name('admin.category');
            Route::get('/create', 'CategoryController@create')->name('admin.category.create');
            Route::post('/store', 'CategoryController@store')->name('admin.category.store');
            Route::get('/edit/{slug}', 'CategoryController@edit')->name('admin.category.edit');
            Route::post('/{slug}/update', 'CategoryController@update')->name('admin.category.update');
            Route::get('/destroy/{slug}', 'CategoryController@destroy')->name('admin.category.destroy');
            Route::get('/show-product/{slug}', 'CategoryController@showProduct')->name('admin.category.show.product');
        });

        // ProductController with resource
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index')->name('admin.product');
            Route::get('/create', 'ProductController@create')->name('admin.product.create');
            Route::post('/get-child-category', 'ProductController@getChildCategory')->name('admin.product.getChildCategory');
            Route::post('/get-child-category-with-selected', 'ProductController@getChildCategoryWithSelected')->name('admin.product.getChildCategoryWithSelected');
            Route::post('/store', 'ProductController@store')->name('admin.product.store');
            Route::get('/edit/{slug}', 'ProductController@edit')->name('admin.product.edit');
            Route::post('/{slug}/update', 'ProductController@update')->name('admin.product.update');
            Route::get('/remove-one-photo/{photoId}/{slug}', 'ProductController@removeOnePhoto')->name('admin.product.removeOnePhoto');
            Route::post('/update-one-photo', 'ProductController@updateOnePhoto')->name('admin.product.update-one-photo');
            Route::post('/add-parent-photo', 'ProductController@addParentPhoto')->name('admin.product.addParentPhoto');
            Route::post('/remove-parent-photo', 'ProductController@removeParentPhoto')->name('admin.product.removeParentPhoto');
            Route::post('/add-child-photo', 'ProductController@addChildPhoto')->name('admin.product.addСhildPhoto');
            Route::post('/remove-child-photo', 'ProductController@removeChildPhoto')->name('admin.product.removeСhildPhoto');
            Route::get('/destroy/{slug}', 'ProductController@destroy')->name('admin.product.destroy');

        });

        // ConfigController with resource
        Route::group(['prefix' => 'config'], function () {
            Route::get('/','ConfigController@index')->name('admin.config');
            Route::post('/{id}/update', 'ConfigController@update')->name('admin.config.update');
        });

        // ContactController with resource
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/','ContactController@index')->name('admin.contact');
            Route::get('/destroy/{slug}', 'ContactController@destroy')->name('admin.contact.destroy');
        });

        // SubscribeController with resource
        Route::group(['prefix' => 'subscribe'], function () {
            Route::get('/','SubscribeController@index')->name('admin.subscribe');
            Route::get('/destroy/{slug}', 'SubscribeController@destroy')->name('admin.subscribe.destroy');
        });

        //User controller
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index')->name('admin.user');
            Route::get('/create', 'UserController@create')->name('admin.user.create');
            Route::post('/store', 'UserController@store')->name('admin.user.store');
            Route::get('/edit/{id}', 'UserController@edit')->name('admin.user.edit');
            Route::post('/{id}/update', 'UserController@update')->name('admin.user.update');
            Route::get('/destroy/{id}', 'UserController@destroy')->name('admin.user.destroy');
        });

        //Order controller
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'OrderController@index')->name('admin.order');
            Route::get('/create', 'OrderController@create')->name('admin.order.create');
            Route::post('/store', 'OrderController@store')->name('admin.order.store');
            Route::get('/show/{basketId}', 'OrderController@show')->name('admin.order.show');
        });
    });
});


//Cache clear
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->back();
})->name('clear.cache');
