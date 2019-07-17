<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;
class Voucher extends Model
{
    use CrudTrait;
    use HasTranslations;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'vouchers';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $translatable = ['voucher_details'];
    protected $fillable = [
        'provider_id',
        'point_count',
        'voucher_image',
        'voucher_details',
        'voucher_type',
        'active'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider', 'provider_id');
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

    public function setVoucherImageAttribute($value)
    {
        $attribute_name = "voucher_image";
        $disk = "public";
        $destination_path = "uploads";

        $this->uploadFileToDisk(
            $value,
            $attribute_name,
            $disk,
            $destination_path
        );
    }
}
