<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group(
    [
        'prefix' => config('backpack.base.route_prefix', 'admin'),
        'middleware' => [
            'web',
            config('backpack.base.middleware_key', 'admin')
        ],
        'namespace' => 'App\Http\Controllers\Admin'
    ],
    function () {
        // custom admin routes
        CRUD::resource('product_type', 'Product_typeCrudController');
        CRUD::resource('products', 'ProductCrudController');

        CRUD::resource('article', 'ArticleCrudController');
        CRUD::resource('category', 'CategoryCrudController');
        CRUD::resource('tag', 'TagCrudController');
        CRUD::resource('order', 'OrderCrudController');
        //     CRUD::resource('order/{id}/OrderItems','Order_itemCrudController');
        CRUD::resource('{OrderId}/OrderItems', 'Order_itemCrudController');
      //  CRUD::resource('project', 'ProjectCrudController');
        CRUD::resource('shipp_com', 'ShippComCrudController');
        CRUD::resource('{OrderId}/shipping', 'ShippingCrudController');
        CRUD::resource('blog', 'BlogCrudController');
        CRUD::resource('student', 'StudentCrudController');
        CRUD::resource('provider', 'ProviderCrudController');
        CRUD::resource('voucher', 'VoucherCrudController');
        CRUD::resource('upload', 'UploadCrudController');
        CRUD::resource('gifttype', 'GiftTypeCrudController');
        CRUD::resource('ProductStudent', 'ProductStudentCrudController');
        CRUD::resource('Slider', 'SliderCrudController');
        CRUD::resource('{SliderId}/SliderItem', 'SliderItemCrudController');
    }
); // this should be the absolute last line of this file
