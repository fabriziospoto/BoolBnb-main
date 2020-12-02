<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function apartments() {
        return $this->hasMany('App\Apartment');
    }
}
