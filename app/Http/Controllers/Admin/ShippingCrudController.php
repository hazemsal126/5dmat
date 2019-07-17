<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ShippingRequest as StoreRequest;
use App\Http\Requests\ShippingRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use App\Models\Order;

/**
 * Class ShippingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ShippingCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Shipping');
        $this->crud->setRoute(config('backpack.base.route_prefix') .
        '/' .
        $this->crud->request->OrderId .
        '/shipping'
    );
        $this->crud->setEntityNameStrings('شحن', 'الشحن');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->query = $this->crud->query->where(
            'order_id',
            "" . $this->crud->request->OrderId . ""
        );
        $qu=Order::where('id',$this->crud->request->OrderId)->first();

        // TODO: remove setFromDb() and manually define Fields and Columnss
        $this->crud->setFromDb();

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'label' => 'المستخدم',
            'type' => 'select',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "\App\User",
        ]);
        $this->crud->addColumn([
            'label' => 'الطلب',
            'type' => 'select',
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => 'total',
            'model' => "\App\Models\Order",
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'الحالة',
        ]);
//        $this->crud->addColumn([
//            'name' => 'date',
//            'label' => 'Date',
//            'type' => 'date',
//        ]);

        // ------ CRUD FIELDS
        $this->crud->modifyField('user_id', [
            // Browse
            'name' => 'user_id',
            'value' => $qu->user_id,
            'type' => 'hidden'
        ]);

        $this->crud->modifyField('order_id', [
            // Browse
            'name' => 'order_id',
            'value' => $this->crud->request->OrderId,
            'type' => 'hidden'
        ]);

        $this->crud->addField([    // ENUM
            'name' => 'status',
            'label' => 'الحالة',
            'type' => 'enum',
        ]);
        $this->crud->addField([    // TEXT
            'name' => 'last_update',
            'label' => 'التاريخ',
            'type' => 'date',
            'value' => date('Y-m-d'),
//            'attributes' => ['disabled' => 'disabled'],
//            'readonly' => true
        ], 'create');

        $this->crud->modifyColumn('last_update', [
            'name' => 'last_update',
            'type' => 'text',
            'label' => 'اخر تحديث'
        ]);
        // add asterisk for fields that are required in ShippingRequest
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
