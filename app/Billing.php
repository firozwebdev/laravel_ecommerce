<?php

namespace App;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    //public $with = ['customer'];
    protected $guarded = ['id'];

    public function customer(){
        return $this->belongsTo('App\Customer');
    }


}
