<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(
            config('backpack.base.route_prefix') . '/products'
        );
        $this->crud->setEntityNameStrings('منتج', 'منتجات');
        //
        $this->crud->setFromDb();
        // $this->crud->modifyField('aquired_amount', [
        //     // TEXT
        //     'name' => 'aquired_amount',
        //     'label' => 'aquired amount',
        //     'type' => 'text'
        // ]);
        // $this->crud->modifyField('target_amount', [
        //     // TEXT
        //     'name' => 'target_amount',
        //     'label' => 'target amount',
        //     'type' => 'text'
        // ]);
        $this->crud->orderBy('id', 'desc');
        $this->crud->modifyColumn('active', [
            'name' => 'active',
            'label' => 'مفعل',
            'type' => 'boolean'
        ]);
        $this->crud->modifyField('active', [
            // Checkbox
            'name' => 'active',
            'label' => 'مفعل',
            'type' => 'checkbox'
        ]);
        $this->crud->modifyColumn('containsGift', [
            'name' => 'containsGift',
            'label' => 'يحتوي على هدية',
            'type' => 'boolean'
        ]);
        $this->crud->modifyField('containsGift', [
            // Checkbox
            'name' => 'containsGift',
            'label' => 'يحتوي على هدية',
            'type' => 'checkbox'
        ]);
        $this->crud->modifyColumn('product_image', [
            'name' => 'product_image', // The db column name
            'label' => "صورة المنتج", // Table column heading
            'prefix' => 'storage/',
            'type' => 'image',
            'height' => '75px'
        ]);

        $this->crud->modifyField('product_image', [
            // Upload
            'name' => 'product_image',
            'label' => 'صورة المنتج',
            'disk' => 'public',
            'type' => 'image',
            'upload' => true
        ]);

        $this->crud->modifyField('product_type', [
            // Select2
            'label' => "نوع المنتج",
            'type' => 'select2',
            'name' => 'product_type', // the db column for the foreign key
            'entity' => 'type', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\Product_type" // foreign key model
        ]);

        $this->crud->addColumn([
            'label' => "نوع المنتج",
            'type' => 'select',
            'name' => 'product_type', // the db column for the foreign key
            'entity' => 'type', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\Product_type" // foreign key model
        ]);

        $this->crud->modifyField('gift_type', [
            // Select2
            'label' => "نوع الهدية",
            'type' => 'select2',
            'name' => 'gift_type', // the db column for the foreign key
            'entity' => 'gifttype', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\GiftType" // foreign key model
        ]);

        $this->crud->addColumn([
            'label' => "نوع الهدية",
            'type' => 'select',
            'name' => 'gift_type', // the db column for the foreign key
            'entity' => 'gifttype', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\GiftType" // foreign key model
        ]);

        $this->crud->modifyField('shipping_by', [
            // Select2
            'label' => "شركة الشحن",
            'type' => 'select2',
            'name' => 'shipping_by', // the db column for the foreign key
            'entity' => 'shipping_company', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\ShippCom" // foreign key model
        ]);

        $this->crud->addColumn([
            'label' => "شركة الشحن",
            'type' => 'select',
            'name' => 'shipping_by', // the db column for the foreign key
            'entity' => 'shipping_company', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\ShippCom" // foreign key model
        ]);

        $this->crud->modifyColumn('name', [
            'name' => 'name',
            'type' => 'text',
            'label' => 'الاسم'
        ]);

        $this->crud->modifyField('name', [
            'name' => 'name',
            'type' => 'text',
            'label' => 'الاسم'
        ]);

        $this->crud->modifyColumn('description', [
            'name' => 'description',
            'type' => 'text',
            'label' => 'الوصف'
        ]);

        $this->crud->modifyField('description', [
            'name' => 'description',
            'type' => 'text',
            'label' => 'الوصف'
        ]);

        $this->crud->modifyColumn('full_details', [
            'name' => 'full_details',
            'type' => 'text',
            'label' => 'التفاصيل'
        ]);

        $this->crud->modifyField('full_details', [
            'name' => 'full_details',
            'type' => 'text',
            'label' => 'التفاصيل'
        ]);

        $this->crud->modifyColumn('price', [
            'name' => 'price',
            'type' => 'text',
            'label' => 'السعر'
        ]);

        $this->crud->modifyField('price', [
            'name' => 'price',
            'type' => 'number',
            'label' => 'السعر'
        ]);

        $this->crud->modifyColumn('acquired_amount', [
            'name' => 'acquired_amount',
            'type' => 'number',
            'label' => 'المبلغ المكتسب'
        ]);

        $this->crud->modifyField('acquired_amount', [
            'name' => 'acquired_amount',
            'type' => 'number',
            'label' => 'المبلغ المكتسب'
        ]);

        $this->crud->modifyColumn('target_amount', [
            'name' => 'target_amount',
            'type' => 'number',
            'label' => 'المبلغ المستهدف'
        ]);

        $this->crud->modifyField('target_amount', [
            'name' => 'target_amount',
            'type' => 'number',
            'label' => 'المبلغ المستهدف'
        ]);

        $this->crud->modifyField('points', [
            'name' => 'points',
            'type' => 'number',
            'label' => 'النقاط'
        ]);

        $this->crud->modifyField('photos', [
            'name' => 'photos',
            'label' => 'Photos',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'public',
        ]);

        $this->crud->modifyColumn('photos', [
            'name' => 'photos',
            'label' => 'الصور',
            'type' => 'upload_multiple',
            'disk' => 'public'
        ]);

        $this->crud->modifyField('style',
        [   // Checkbox
            'name' => 'style',
            'label' => 'الشكل',
            'type' => 'enum',
        ]);

        $this->crud->modifycolumn('style',
        [   // Checkbox
            'name' => 'style',
            'label' => 'الشكل',
            'type' => 'text',
        ]);



        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns

        // add asterisk for fields that are required in ProductRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
