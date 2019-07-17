<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPointRedeem extends Model
{
    //
    protected $table = "user_point_redeem";

    public function voucher()
    {
        return $this->belongsTo('\App\Models\Voucher', 'voucher_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
}
