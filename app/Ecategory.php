<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecategory extends Model
{

    protected $fillable = ['category_name','category_description','publication_status'];

    public function eproducts(){
        return $this->hasMany('App\Eproduct');
    }
}
