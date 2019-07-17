<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Order_itemRequest as StoreRequest;
use App\Http\Requests\Order_itemRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class Order_itemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Order_itemCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        \DB::enableQueryLog();
        $this->crud->setModel('App\Models\Order_item');
        $this->crud->setRoute(
            config('backpack.base.route_prefix') .
                '/' .
                $this->crud->request->OrderId .
                '/OrderItems'
        );
        $this->crud->setEntityNameStrings('عنصر الطلب', 'عناصر الطلب');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        // $this->crud->addClause('where', 'order_id', (int)$this->crud->request->id);
        // if($this->crud->actionIs("search"))
        // {
        //     // dd($this->crud->request->id);
        //     dd(\Request::input());
        $this->crud->query = $this->crud->query->where(
            'order_id',
            "" . $this->crud->request->OrderId . ""
        );
        // }
        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->addColumn([
            'label' => 'الطلب',
            'type' => 'select',
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => 'id',
            'model' => "Backpack\NewsCRUD\app\Models\Order"
        ]);
        $this->crud->addColumn([
            'label' => 'المنتج',
            'type' => 'select',
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Product"
        ]);

        $this->crud->addColumn([
            'name' => 'count',
            'label' => 'الاسم',
            'type' => 'number'
        ]);
        $this->crud->addColumn([
            'name' => 'price',
            'label' => 'السعر',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'total_price',
            'label' => 'السعر الاجمالي',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'label' => 'الطلب',
            'type' => 'select2',
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => 'id',
            'model' => "\App\Models\Order"
        ]);
        $this->crud->addField([
            'label' => 'المنتج',
            'type' => 'select2',
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => "\App\Models\Product"
        ]);
        $this->crud->addField([
            // TEXT
            'name' => 'count',
            'label' => 'العدد',
            'type' => 'number'
            //            'placeholder' => 'Your title here',
        ]);

        $this->crud->addField([
            // TEXT
            'name' => 'price',
            'label' => 'السعر',
            'type' => 'text',
            'placeholder' => 'Enter your price here'
        ]);
        $this->crud->addField([
            // TEXT
            'name' => 'total_price',
            'label' => 'السعر الاجمالي',
            'type' => 'text',
            'placeholder' => 'Enter your total price here'
        ]);

        // add asterisk for fields that are required in Order_itemRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }
    public function ShowOrderItems($id)
    {
        $this->data['crud'] = $this->crud;
        return view('vendor.backpack.crud.list', $this->data);
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
