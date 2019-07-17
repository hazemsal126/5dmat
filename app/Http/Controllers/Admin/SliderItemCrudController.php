<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SliderItemRequest as StoreRequest;
use App\Http\Requests\SliderItemRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SliderItemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SliderItemCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\SliderItem');
        $this->crud->setRoute(
            config('backpack.base.route_prefix') .
                '/' .
                $this->crud->request->SliderId .
                '/SliderItem'
        );
        $this->crud->setEntityNameStrings('سلايدر عنصر', 'سلايدر العناصر');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->query = $this->crud->query->where(
            'slider_id',
            "" . $this->crud->request->SliderId . ""
        );
        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        // $this->crud->removeField('slider_id');

        $this->crud->modifyColumn('image', [
            'name' => 'image', // The db column name
            'label' => "صورة السلايدر", // Table column heading
            'prefix' => 'storage/',
            'type' => 'image',
            'height' => '75px'
        ]);

        $this->crud->modifyField('status', [
            'name' => 'status',
            'label' => 'مفعل',
            'type' => 'checkbox'
        ]);
        $this->crud->modifyField('image', [
            // Browse
            'name' => 'image',
            'label' => 'الصورة',
            'type' => 'browse'
        ]);

        $this->crud->modifyColumn('image', [
            'name' => 'image', // The db column name
            'label' => "الصورة", // Table column heading
            'height' => '75px'
        ]);

        $this->crud->modifyField('slider_id', [
            // Browse
            'name' => 'slider_id',
            'value' => $this->crud->request->SliderId,
            'type' => 'hidden'
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

        $this->crud->modifyColumn('action', [
            'name' => 'action',
            'type' => 'text',
            'label' => 'الحدث'
        ]);

        $this->crud->modifyField('action', [
            'name' => 'action',
            'type' => 'text',
            'label' => 'الحدث'
        ]);

        $this->crud->modifyColumn('status', [
            'name' => 'status',
            'type' => 'boolean',
            'label' => 'الحالة'
        ]);

        // add asterisk for fields that are required in SliderItemRequest
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
