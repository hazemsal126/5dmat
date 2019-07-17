<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Product_typeRequest as StoreRequest;
use App\Http\Requests\Product_typeRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class Product_typeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Product_typeCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product_type');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product_type');
        $this->crud->setEntityNameStrings('نوع منتج', 'أنواع المنتجات');
        $this->crud->filters(); // gets all the filters

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
            'name' => 'description',
            'label' => 'وصف',
        ]);
        $this->crud->addField([    // TEXT
            'name' => 'name',
            'label' => 'الاسم',
            'type' => 'text',
            'placeholder' => 'Your name here',
        ]);
        $this->crud->addField([    // TEXT
            'name' => 'description',
            'label' => 'وصف',
            'type' => 'ckeditor',
            'placeholder' => 'Your description here',
        ]);
        $this->crud->modifyColumn('active',[
            'name' => 'active',
            'label' => 'مفعل',
            'type' => 'boolean'
         ]);
        $this->crud->modifyField('active',
        [   // Checkbox
            'name' => 'active',
            'label' => 'مفعل',
            'type' => 'checkbox'
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

        // add asterisk for fields that are required in Product_typeRequest
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
