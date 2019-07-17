<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StudentRequest as StoreRequest;
use App\Http\Requests\StudentRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class StudentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class StudentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Student');
        $this->crud->setRoute(
            config('backpack.base.route_prefix') . '/student'
        );
        $this->crud->setEntityNameStrings('طالب', 'الطلاب');

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
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'الحالة'
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'name',
            'label' => 'الاسم',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => 'الحالة',
            'type' => 'enum'
        ]);

        $this->crud->modifyColumn('image', [
            'name' => 'image', // The db column name
            'label' => "صورة الطالب", // Table column heading
            'prefix' => 'storage/',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'type' => 'image',
            'height' => '75px'
        ]);

        $this->crud->modifyField('image', [
            // Upload
            'name' => 'image',
            'label' => 'صورة الطالب',
            'disk' => 'public',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'type' => 'image',
            'upload' => true
        ]);

        // add asterisk for fields that are required in StudentRequest
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
