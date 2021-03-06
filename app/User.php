<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function orders()
    {
        return $this->hasMany('\App\Models\Order', 'user_id');
    }
    public function addresses()
    {
        return $this->hasMany('\App\Address', 'user_id');
    }
    public function shippings()
    {
        return $this->hasMany('\App\Models\Shipping', 'user_id');
    }
}
