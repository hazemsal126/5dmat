<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SliderRequest as StoreRequest;
use App\Http\Requests\SliderRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SliderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SliderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Slider');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/Slider');
        $this->crud->setEntityNameStrings('سلايدر', 'السلايدات');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->modifyField('position', [
            'name' => 'position',
            'label' => 'مكان السلايدر',
            'type' => 'enum'
        ]);
        $this->crud->modifyField('status', [
            'name' => 'status',
            'label' => 'مفعل',
            'type' => 'checkbox'
        ]);

        $this->crud->modifyColumn('position', [
            'name' => 'position',
            'type' => 'text',
            'label' => 'مكان السلايدر'
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

        $this->crud->modifyColumn('status', [
            'name' => 'status',
            'type' => 'boolean',
            'label' => 'الحالة'
        ]);


        $this->crud->addButtonFromModelFunction(
            'line',
            'open_slider_items',
            'openSliderItems',
            'beginning'
        );
        // add asterisk for fields that are required in SliderRequest
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
