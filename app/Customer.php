<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $with = ['billing','shipping','orders'];
    protected $guarded = ['id'];



    public function billing(){
        return $this->hasOne('App\Billing');
    }
    public function shipping(){
        return $this->hasOne('App\Shipping');
    }
    public function payment(){
        return $this->hasMany('App\Shipping');
    }

    public function wishlists(){
        return $this->hasMany('App\Wishlist');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = md5($value);
    }
    public function getFullNameAttributes(){
        return $this->first_name.' '.$this->last_name;
    }
}
