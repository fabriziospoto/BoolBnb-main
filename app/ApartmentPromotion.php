<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentPromotion extends Model {
    public $timestamps = false;
    protected $table = 'apartment_promotion';
    protected $guarded = ['updated_at'];

    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }

}
