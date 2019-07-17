<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BlogRequest as StoreRequest;
use App\Http\Requests\BlogRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class BlogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BlogCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Blog');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/blog');
        $this->crud->setEntityNameStrings('مدونة', 'المدونات');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

// ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'الاسم',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'الحالة',
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'الوصف',
            'visibleInTable' => false,
        ]);
        $this->crud->modifyColumn('image', [
            'name' => 'image', // The db column name
            'label' => "صورة المنتج", // Table column heading
            'prefix' => 'storage/',
            'type' => 'image',
            'height' => '75px',

        ]);

// ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'name',
            'label' => 'الاسم',
            'type' => 'text',
        ]);
        $this->crud->addField([    // TEXT
            'name' => 'description',
            'label' => 'الوصف',
            'type' => 'ckeditor',
            'placeholder' => 'Your description here',
        ]);
        $this->crud->modifyField('image',
            [   // Upload
                'name' => 'image',
                'label' => 'الصورة',
                'type' => 'upload',
                'upload' => true
            ]
        );
        $this->crud->addField([
            'name' => 'status',
            'label' => 'الحالة',
            'type' => 'enum',
        ]);
        // add asterisk for fields that are required in BlogRequest
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
