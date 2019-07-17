<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ShippComRequest as StoreRequest;
use App\Http\Requests\ShippComRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ShippComCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ShippComCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ShippCom');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/shipp_com');
        $this->crud->setEntityNameStrings('شركة شحن', 'شركات الشحن');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'الاسم',
        ]);
        $this->crud->addColumn([
            'name' => 'time',
            'label' => 'الاسم',
        ]);
        $this->crud->addColumn([
            'name' => 'price',
            'label' => 'السعر',
        ]);
        $this->crud->addColumn([
            'name' => 'code',
            'label' => 'كود',
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'الحالة',
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'name',
            'label' => 'الاسم',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'time',
            'label' => 'الوقت',
            'type' => 'text'
        ]);
        $this->crud->addField([    // TEXT
            'name' => 'price',
            'label' => 'السعر',
            'type' => 'number',
        ]);
        $this->crud->addField([
            'name' => 'code',
            'label' => 'كود',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => 'الحالة',
            'type' => 'enum',
        ]);

        // add asterisk for fields that are required in ShippComRequest
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
