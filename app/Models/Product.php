<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;
use Illuminate\Support\Str;

class Product extends Model
{
    use CrudTrait;
    use HasTranslations;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'product';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $translatable = ['name', 'description', 'full_details'];
    protected $fillable = [
        'name',
        'description',
        'full_details',
        'active',
        'price',
        'points',
        'containsGift',
        'shipping_by',
        'product_type',
        'product_image',
        'acquired_amount',
        'gift_type',
        'target_amount',
        'photos',
        'style'
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
    protected $casts = [
        'photos' => 'array'
    ];

    public function type()
    {
        return $this->belongsTo(
            '\App\Models\Product_type',
            'product_type',
            'id'
        );
    }
    public function gifttype()
    {
        return $this->belongsTo('\App\Models\GiftType', 'gift_type', 'id');
    }
    public function shipping_company()
    {
        return $this->belongsTo('\App\Models\ShippCom', 'shipping_by', 'id');
    }
    // public function orders()
    // {
    //     return $this->hasManyThrough(Order_item::class, Order::class);
    // }
    public function order_items()
    {
        return $this->hasMany('\App\Models\Order_item', 'product_id');
    }
    public function ratings()
    {
        return $this->hasMany('\App\ProductRating', 'product_id');
    }
    public function students()
    {
        return $this->belongsToMany('\App\Models\Student');
    }
    public function articles()
    {
        return $this->hasMany('\App\Models\Article', 'product_id');
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

    public function setProductImageAttribute($value)
    {
        // dd($value);
        $attribute_name = "product_image";
        $disk = "public";
        $destination_path = "uploads";

        // $this->uploadFileToDisk(
        //     $value,
        //     $attribute_name,
        //     $disk,
        //     $destination_path
        // );


          // if a base64 was sent, store it in the db
          if (starts_with($value, 'data:image'))
          {
              // 0. Make the image
              $image = \Image::make($value)->encode('jpg', 90);
              // 1. Generate a filename.
              $filename = md5($value.time()).'.jpg';
              // 2. Store the image on disk.
              \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
              // 3. Save the public path to the database
          // but first, remove "public/" from the path, since we're pointing to it from the root folder
          // that way, what gets saved in the database is the user-accesible URL
              $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
              $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
          }

    }

    public function setPhotosAttribute($value)
    {
        $attribute_name = "photos";
        $disk = "public";
        $destination_path = "uploads";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }

}
