<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model {

    public $timestamps = false;
    protected $guarded = [];
    /* protected $fillable = ['view_date','apartment_id']; */

    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
