<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eproduct extends Model
{
    public $with = ['ecategory'];
    protected $guarded = ['id'];

    public function ecategory(){
        return $this->belongsTo('App\Ecategory');
    }

    public function wishlists(){
        return $this->hasMany('App\Wishlist');
    }
}
