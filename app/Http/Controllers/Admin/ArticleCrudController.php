<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as StoreRequest;
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as UpdateRequest;

class ArticleCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Article");
        $this->crud->setRoute(
            config('backpack.base.route_prefix', 'admin') . '/article'
        );
        $this->crud->setEntityNameStrings('مقال', 'المقالات');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'date',
            'label' => 'التاريخ',
            'type' => 'date'
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'الحالة'
        ]);
        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'العنوان'
        ]);
        $this->crud->addColumn([
            'name' => 'featured',
            'label' => 'متميز',
            'type' => 'check'
        ]);
        $this->crud->addColumn([
            'label' => 'القسم',
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category"
        ]);
        $this->crud->addColumn([
            'label' => 'المنتج',
            'type' => 'select',
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => "\App\Models\Product"
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
            // TEXT
            'name' => 'title',
            'label' => 'العنوان',
            'type' => 'text',
            'placeholder' => 'Your title here'
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' =>
                'Will be automatically generated from your title, if left empty.'
            // 'disabled' => 'disabled'
        ]);

        $this->crud->addField(
            [
                // TEXT
                'name' => 'date',
                'label' => 'التاريخ',
                'type' => 'date',
                'value' => date('Y-m-d')
            ],
            'create'
        );
        $this->crud->addField(
            [
                // TEXT
                'name' => 'date',
                'label' => 'التاريخ',
                'type' => 'date'
            ],
            'update'
        );

        $this->crud->addField([
            // WYSIWYG
            'name' => 'content',
            'label' => 'المحتوى',
            'type' => 'ckeditor',
            'placeholder' => 'Your textarea text here'
        ]);
        $this->crud->addField([
            // Image
            'name' => 'image',
            'label' => 'الصورة',
            'type' => 'browse'
        ]);
        $this->crud->addField([
            // SELECT
            'label' => 'القسم',
            'type' => 'select2',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category"
        ]);
        $this->crud->addField([
            // SELECT
            'label' => 'المنتج',
            'type' => 'select2',
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => "\App\Models\Product"
        ]);

        $this->crud->addField([
            // Select2Multiple = n-n relationship (with pivot table)
            'label' => 'علامات',
            'type' => 'select2_multiple',
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "Backpack\NewsCRUD\app\Models\Tag", // foreign key model
            'pivot' => true // on create&update, do you need to add/delete pivot table entries?
        ]);
        $this->crud->addField([
            // ENUM
            'name' => 'status',
            'label' => 'الحالة',
            'type' => 'enum'
        ]);
        $this->crud->addField([
            // CHECKBOX
            'name' => 'featured',
            'label' => 'تميز',
            'type' => 'checkbox'
        ]);

        $this->crud->enableAjaxTable();
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}
