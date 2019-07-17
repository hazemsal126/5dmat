<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Upload extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'uploads';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name','size','type','time','status','seen','url','web_url','article_id'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function article()
    {
        return $this->belongsToMany('\App\Models\Article');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

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
    public function setUrlAttribute($value)
    {
        $attribute_name = "url";
        $disk = "public";
        $destination_path = "uploads";

        $this->uploadFileToDisk(
            $value,
            $attribute_name,
            $disk,
            $destination_path
        );

    }

    public function setTimeAttribute($value)
    {
        $attribute_name = "time";

        $this->attributes["$attribute_name"]='0';

    }
    public function setSeenAttribute($value)
    {
        $attribute_name = "seen";

        $this->attributes["$attribute_name"]='0';

    }


}
