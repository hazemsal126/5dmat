<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Order_item;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrderRequest as StoreRequest;
use App\Http\Requests\OrderRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Illuminate\Support\Facades\DB;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('طلب', 'الطلبات');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // $this->crud->modifyColumn('user_id',[
        //     'name' => 'user.name',
        //     'type' => 'text',
        //     'label' => 'User name',
        // ]);
        $this->crud->addColumn([
            'name' => 'total',
            'label' => 'المجموع',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'item_count',
            'label' => 'عدد العناصر',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'label' => 'الاسم',
            'type' => 'select',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "\App\User",
        ]);

        $this->crud->addColumn([
            'name' => 'tracking_number',
            'label' => 'كود التتبع',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'tracking_number',
            'label' => 'كود التتبع',
            'type' => 'text',
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'total',
            'label' => 'المجموع',
            'type' => 'text',
//            'placeholder' => 'Your title here',
        ]);


        $this->crud->addField([
            'label' => 'الاسم',
            'type' => 'select2',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "\App\User",
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'item_count',
            'label' => 'عدد العناصر',
            'type' => 'text',
//            'placeholder' => 'Your title here',
        ]);

        $this->crud->removeField('received','both');


        // // add asterisk for fields that are required in OrderRequest
         $this->crud->addButtonFromModelFunction('line', 'open_order_details', 'openDetails', 'beginning');
         $this->crud->addButtonFromModelFunction('line', 'shipDetails', 'shipDetails', 'beginning');

        // $this->crud->enableDetailsRow();
        // $this->crud->allowAccess('details_row');

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
    public function order_item($id){

        $order=DB::table('order')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->first();
//        dd($order);
        $items = DB::table('order_items')
            ->join('product', 'order_items.product_id', '=', 'product.id')
            ->join('product_types', 'product.product_type', '=', 'product_types.id')
            ->where('order_items.order_id',$id)
            ->select('product.*','order_items.*','product_types.name as type')
            ->get();
//        dd($order,$items);
        return view('show',compact('order','items'));

    }
    public function sales(){

        $orders = DB::table('order_items')
            ->join('order', 'order_items.order_id', '=', 'order.id')
            ->join('product', 'order_items.product_id', '=', 'product.id')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->select('users.*','users.name as uname','product.*','product.name as pname','product.price as pprice','order.*','order_items.*','order_items.price as oprice')
            ->paginate(1);
//        dd($orders);
        return view('sale',compact('orders'));
    }
}
