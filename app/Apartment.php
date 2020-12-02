<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class Apartment extends Model {
    use Geographical;
    protected static $kilometers = true;

    // protected $guarded = [];
    protected $fillable = ['id', 'category_id', 'title', 'description', 'address', 'latitude', 'longitude', 'size', 'room_number', 'bed_number', 'bath_number', 'created_at', 'updated_at', 'user_id'];

    /* Relazione con User molti a uno work!*/

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function services() {
        return $this->belongsToMany('App\Service');
    }

    public function views() {
        return $this->hasMany('App\View');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function images() {
        return $this->hasMany('App\Image');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function promotions() {
        return $this->belongsToMany('App\Promotion');
    }

    public function apartment_promotion() {
        return $this->hasMany('App\ApartmentPromotion');
    }

}
