<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProviderRequest as StoreRequest;
use App\Http\Requests\ProviderRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProviderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProviderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Provider');
        $this->crud->setRoute(
            config('backpack.base.route_prefix') . '/provider'
        );
        $this->crud->setEntityNameStrings('مزود', 'المزودين');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->setFromDb();

        $this->crud->modifyField('company_image', [
            // Upload
            'name' => 'company_image',
            'label' => 'صورة الشركة',
            'type' => 'upload',
            'upload' => true
        ]);

        $this->crud->modifyColumn('company_image', [
            'name' => 'company_image', // The db column name
            'label' => "صورة الشركة", // Table column heading
            'prefix' => 'storage/',
            'type' => 'image',
            'height' => '75px'
        ]);

        $this->crud->modifyColumn('active', [
            'name' => 'active',
            'label' => 'مفعل',
            'type' => 'boolean'
        ]);
        $this->crud->modifyField('active', [
            // Checkbox
            'name' => 'active',
            'label' => 'مفعل',
            'type' => 'checkbox'
        ]);

        $this->crud->modifyColumn('company_name', [
            'name' => 'company_name',
            'type' => 'text',
            'label' => 'اسم الشركة'
        ]);

        $this->crud->modifyField('company_name', [
            'name' => 'company_name',
            'type' => 'text',
            'label' => 'اسم الشركة'
        ]);

        $this->crud->modifyColumn('company_url', [
            'name' => 'company_url',
            'type' => 'text',
            'label' => 'رابط الشركة'
        ]);

        $this->crud->modifyField('company_url', [
            'name' => 'company_url',
            'type' => 'text',
            'label' => 'رابط الشركة'
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns

        // add asterisk for fields that are required in ProviderRequest
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
