<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;
class Order extends Model
{
    use CrudTrait;
    use HasTranslations;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'order';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['total', 'user_id', 'item_count','tracking_number','received'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function openDetails($crud = false)
    {
        return '<a class="btn btn-xs btn-default" target="_blank" href="' .
            url("admin/{$this->id}" . '/' . "OrderItems") .
            '" data-toggle="tooltip" title="Details."><i class="fa fa-info-circle"></i> Details</a>';
    }

    public function shipDetails($crud = false)
    {
        return '<a class="btn btn-xs btn-default" target="_blank" href="' .
            url("admin/{$this->id}" . '/' . "shipping") .
            '" data-toggle="tooltip" title="Details."><i class="fa fa-info-circle"></i> عرض الحالة</a>';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
    public function order_items()
    {
        return $this->hasMany('\App\Models\Order_item', 'order_id');
    }
    public function shipping()
    {
        return $this->hasOne('\App\Models\Shipping', 'order_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
