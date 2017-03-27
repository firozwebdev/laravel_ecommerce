<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //public $with = ['customer'];
    protected $guarded = ['id'];

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
