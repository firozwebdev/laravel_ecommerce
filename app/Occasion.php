<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $guarded = ['id'];

    public function eproducts(){
        return $this->hasMany('App\Eproduct');
    }
}
