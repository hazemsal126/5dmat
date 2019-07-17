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

Route::get('/testEvent', function(){
    $event = new \App\Events\SendChatEvent(date('Y-m-d H:i:s'),session('chat'));
    broadcast($event);
});
Route::get('/testecho', function(){
    $chat_id=session('chat');
    if(!isset($chat_id)){
    session(['chat'=>rand(10000000,99999999)]);
    }
    return view('testecho');
});


if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {
    if (Request::segment(1) == 'ar_SA') {
        App::setLocale("ar_SA");
        Config::set('app.locale_prefix', 'ar_SA');
    } elseif(Request::segment(1) == 'fr') {
        App::setLocale("fr");
        Config::set('app.locale_prefix', 'fr');
    }
} else {
    App::setLocale('en');
    Config::set('app.locale_prefix','');
}
Route::group(array('prefix' => Config::get('app.locale_prefix')), function () {
    Route::post('/chatstore/{type?}', 'HomeController@chatstore')->name('chatstore');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login', 'HomeController@login')->name("login");
    Route::post('/login', 'HomeController@checkLogin')->name("login");
    Route::get('/register', 'HomeController@register')->name("register");
    Route::post('/register', 'HomeController@doRegister')->name("register");
    Route::post('/subscribeMailList', 'HomeController@subscribeMailList')->name("subscribeMailList");
    Route::group(
        [
            'prefix' => config('backpack.base.route_prefix', 'admin'),
            'middleware' => [
                'web',
                config('backpack.base.middleware_key', 'admin')
            ]
        ],
        function () {
            Route::get('viewItem/{id}', 'Admin\OrderCrudController@order_item');
            Route::get('/message', 'HomeController@message')->name('message');
            Route::get('/msgid/{session_id}', 'HomeController@msgid')->name('msgid');
        }
    );
    Route::group(
        [
            'prefix' => "UserAccount",
            'middleware' => 'web'
        ],
        function () {
            Route::resource('Addresses', 'Account\AddressController');
            Route::get(
                'Addresses/MarkAsDefault/{addressId}',
                'Account\AddressController@markAsDefault'
            )->name('MarkAsDefault');
            Route::get(
                'Addresses/States/{CountryId?}',
                'Account\AddressController@getStates'
            )->name('GET_STATES');
            Route::get(
                'Addresses/Cities/{StateId?}',
                'Account\AddressController@getCities'
            )->name('GET_CITIES');
            Route::get(
                'Addresses/{addressId}/delete',
                'Account\AddressController@destroy'
            )->name('DeleteAddresses');
            Route::post(
                'Addresses/{addressId}/edit',
                'Account\AddressController@update'
            )->name('UpdateAddress');

            Route::get(
                'Points/Programs',
                'Account\PointsController@programs'
            )->name('Points/Programs');

            Route::get(
                'Points/Redeem',
                'Account\PointsController@redeem'
            )->name('Points/Redeem');

            Route::get(
                'Points/RedeemVoucher/{voucherId}',
                'Account\PointsController@redeemVoucher'
            )->name('Points/RedeemVoucher');

            Route::resource('Points', 'Account\PointsController');
            Route::resource('Students', 'Account\StudentsController');
            Route::get('Ratings', 'Account\RatingsController@index')->name('Ratings.index');
            Route::get('Ratings/create/{id}/{order_id}', 'Account\RatingsController@create')->name('Ratings.create');
            Route::post('Ratings/store/{id}/{order_id}', 'Account\RatingsController@store')->name('Ratings.store');

            Route::get('Profile', 'Account\ProfileController@index')->name(
                'Profile.index'
            );

            Route::get(
                'Profile/logout',
                'Account\ProfileController@logout'
            )->name('Profile.logout');

            Route::get('Orders', 'Account\OrdersController@index')->name(
                'Orders.index'
            );

            Route::get('received/{id}', 'Account\OrdersController@received')->name(
                'Orders.received'
            );

            Route::get('delete/{id}', 'Account\OrdersController@delete')->name(
                'Orders.delete'
            );
        }
    );

    Route::group(
        [
            'prefix' => "SiteInformation"
        ],
        function () {
            Route::get('Privacy', 'SiteInfoController@privacy')->name(
                'privacy'
            );
            Route::get('Policy', 'SiteInfoController@policy')->name('policy');
            Route::get('wages', 'SiteInfoController@wages')->name('wages');
            Route::get('FAQ', 'SiteInfoController@faq')->name('faq');
            Route::get('About', 'SiteInfoController@about')->name('about');
            Route::get('Contact', 'SiteInfoController@contact')->name(
                'contact'
            );
        }
    );

    Route::group(
        [
            'prefix' => "Blog"
        ],
        function () {
            Route::get('/', 'BlogController@index')->name('blogs');
            Route::get('/{id}', 'BlogController@blog')->name('blog');
        }
    );
    Route::group(
        [
            'prefix' => "Product"
        ],
        function () {
            Route::get(
                '/filter/{product_category?}/{product_category_id?}/{general_sort?}/{price?}/{priceValueRangeFrom?}/{priceValueRangeTo?}/{product_sort?}/{rating?}/{gift_sort?}/{shipping_sort?}',
                'ProductController@filters'
            )->name('product-filters');
            Route::post(
                '/filter/{product_category?}/{product_category_id?}/{general_sort?}/{price?}/{priceValueRangeFrom?}/{priceValueRangeTo?}/{product_sort?}/{rating?}/{gift_sort?}/{shipping_sort?}',
                'ProductController@filters'
            );
            Route::get('/{ProductId}', 'ProductController@details')->name(
                'product-details'
            );
            Route::post('/add-to-cart', 'ProductController@addToCart')->name(
                'add-to-cart'
            );

            Route::post('/search', 'ProductController@search')->name(
                'search'
            );
        }
    );

    Route::group(
        [
            'prefix' => "Orders"
        ],
        function () {
            Route::get('Cart', 'Account\OrdersController@cart')->name('cart');
            Route::get('Shipping', 'Account\OrdersController@shipping')->name(
                'shipping'
            );
            Route::get(
                'Billing',
                'Account\OrdersController@paymentinformation'
            )->name('paymentinformation');
            Route::get(
                'RemoveCartItem/{itemId}',
                'Account\OrdersController@removeCartItem'
            )->name('removeCartItem');

            Route::post(
                '/SetAddress',
                'Account\OrdersController@setAddress'
            )->name("SET_ADDRESS");
            Route::get(
                '/dopayment',
                'Account\OrdersController@dopayment'
            )->name("dopayment");
        }
    );
});

