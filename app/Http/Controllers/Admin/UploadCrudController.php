<?php

namespace App\Http\Controllers\Admin;

use App\Models\Upload;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UploadRequest as StoreRequest;
use App\Http\Requests\UploadRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class UploadCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UploadCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Upload');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/upload');
        $this->crud->setEntityNameStrings('رفع', 'الرفع');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addColumn([
            'name' => 'size',
            'label' => 'الحجم',
            'visibleInTable' => false,
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'الحالة',
        ]);
        $this->crud->modifyColumn('url', [
            'name' => 'url', // The db column name
            'label' => "صورة", // Table column heading
            'prefix' => 'storage/',
            'type' => 'image',

        ]);
        $this->crud->addColumn([
            'name' => 'time',
            'label' => 'الوقت',
            'visibleInTable' => false,
        ]);
        $this->crud->addColumn([
            'name' => 'seen',
            'label' => 'مشاهدة',
            'visibleInTable' => false,
        ]);
        $this->crud->addColumn([
            'name' => 'web_url',
            'label' => 'web_url',
            'visibleInTable' => false,
        ]);


        $this->crud->addField([
            'name' => 'size',
            'label' => 'الحجم',
            'type'  => 'hidden',
        ]);
        $this->crud->addField([
            'name' => 'type',
            'label' => 'النوع',
            'type'  => 'hidden',
        ]);
        $this->crud->addField([
            'name' => 'time',
            'label' => 'الوقت',
            'type'  => 'hidden',
        ]);
        $this->crud->addField([
            'name' => 'seen',
            'label' => 'مشاهدة',
            'type'  => 'hidden',
        ]);
        $this->crud->addField([
            'name' => 'web_url',
            'label' => 'web_url',
            'type'  => 'hidden',
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'enum',
        ]);
        $this->crud->modifyField('url',
            [   // Upload
                'name' => 'url',
                'label' => 'الصورة',
                'type' => 'upload',
                'upload' => true
            ]
        );
        // add asterisk for fields that are required in UploadRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }
    public function store(StoreRequest $request)
    {
        // your additional operations before save here

//dd($request->all());
        $request->merge(["size"=>$request->file("url")->getSize()]);
        $request->merge(["type"=>$request->file("url")->getMimeType()]);

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
