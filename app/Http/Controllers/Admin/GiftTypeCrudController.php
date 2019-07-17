<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\GiftTypeRequest as StoreRequest;
use App\Http\Requests\GiftTypeRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class GiftTypeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class GiftTypeCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\GiftType');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/gifttype');
        $this->crud->setEntityNameStrings('نوع هدية', 'أنواع الهداية');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

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

        // add asterisk for fields that are required in GiftTypeRequest
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
