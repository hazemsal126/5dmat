<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    //
    protected $table = "user_points";

    public function product()
    {
        return $this->belongsTo('\App\Models\Product', 'product_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo('\App\Models\Order', 'order_id', 'id');
    }
}
