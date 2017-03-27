<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $with = ['eproducts'];
    protected $guarded = ['id'];

    public function eproducts(){
        return $this->belongsTo('App\Eproduct');
    }
    public function customer(){
        return $this->belongsToMany('App\Eproduct');
    }
}
