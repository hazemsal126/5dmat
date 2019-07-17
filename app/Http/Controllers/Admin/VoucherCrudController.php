<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VoucherRequest as StoreRequest;
use App\Http\Requests\VoucherRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class VoucherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class VoucherCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Voucher');
        $this->crud->setRoute(
            config('backpack.base.route_prefix') . '/voucher'
        );
        $this->crud->setEntityNameStrings('قسيمة', 'القسائم');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->setFromDb();

        $this->crud->modifyField('voucher_type', [
            // Enum
            'name' => 'voucher_type',
            'label' => 'نوع القسيمة',
            'type' => 'enum'
        ]);

        $this->crud->modifyColumn('voucher_type', [
            // Enum
            'name' => 'voucher_type',
            'label' => 'نوع القسيمة',
            'type' => 'text'
        ]);

        $this->crud->modifyField('provider_id', [
            // Select2
            'label' => "المزود",
            'type' => 'select2',
            'name' => 'provider_id', // the db column for the foreign key
            'entity' => 'provider', // the method that defines the relationship in your Model
            'attribute' => 'company_name', // foreign key attribute that is shown to user
            'model' => "\App\Models\Provider" // foreign key model
        ]);


        $this->crud->addColumn([
            'label' => "المزود",
            'type' => 'select',
            'name' => 'provider_id', // the db column for the foreign key
            'entity' => 'provider', // the method that defines the relationship in your Model
            'attribute' => 'company_name', // foreign key attribute that is shown to user
            'model' => "\App\Models\Provider" // foreign key model
        ]);

        $this->crud->modifyField('voucher_image', [
            // Upload
            'name' => 'voucher_image',
            'label' => 'صورة القسيمة',
            'type' => 'upload',
            'upload' => true
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

        $this->crud->modifyColumn('voucher_image', [
            'name' => 'voucher_image', // The db column name
            'label' => "صورة القسيمة", // Table column heading
            'prefix' => 'storage/',
            'type' => 'image',
            'height' => '75px'
        ]);

        $this->crud->modifyColumn('point_count', [
            'name' => 'point_count',
            'type' => 'text',
            'label' => 'عدد النقاط'
        ]);

        $this->crud->modifyField('point_count', [
            'name' => 'point_count',
            'type' => 'number',
            'label' => 'عدد النقاط'
        ]);

        $this->crud->modifyColumn('voucher_details', [
            'name' => 'voucher_details',
            'type' => 'text',
            'label' => 'التفاصيل'
        ]);

        $this->crud->modifyField('voucher_details', [
            'name' => 'voucher_details',
            'type' => 'text',
            'label' => 'التفاصيل'
        ]);


        // TODO: remove setFromDb() and manually define Fields and Columns

        // add asterisk for fields that are required in VoucherRequest
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
