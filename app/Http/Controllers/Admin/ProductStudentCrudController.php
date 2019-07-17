<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductStudentRequest as StoreRequest;
use App\Http\Requests\ProductStudentRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProductStudentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductStudentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductStudent');
        $this->crud->setRoute(
            config('backpack.base.route_prefix') . '/ProductStudent'
        );
        $this->crud->setEntityNameStrings('منتج طالب', 'منتجات الطلاب');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->modifyColumn('student_id', [
            'name' => 'student.name',
            'type' => 'text',
            'label' => 'اسم الطالب'
        ]);

        $this->crud->modifyField('student_id', [
            // Select2
            'label' => "اسم الطالب",
            'type' => 'select2',
            'name' => 'student_id', // the db column for the foreign key
            'entity' => 'student', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\Student" // foreign key model
        ]);

        $this->crud->modifyColumn('product_id', [
            'name' => 'product.name',
            'type' => 'text',
            'label' => 'اسم المنتج'
        ]);

        $this->crud->modifyField('product_id', [
            // Select2
            'label' => "اسم المنتج",
            'type' => 'select2',
            'name' => 'product_id', // the db column for the foreign key
            'entity' => 'product', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "\App\Models\Product" // foreign key model
        ]);

        // add asterisk for fields that are required in ProductStudentRequest
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
