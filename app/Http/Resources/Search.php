<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Search extends JsonResource {

    /*
    api for tomtom
     */

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'bed_number' => $this->bed_number,
            'bath_number' => $this->bath_number,
            'room_number' => $this->room_number,
            'size' => $this->size,
            'description' => $this->description,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'images' => $this->images,
            'category' => $this->category->name,
            'services' => $this->services,
            'promotion' => $this->promotions,
            'promo' => $this->apartment_promotion,
            'visible' => $this->visible,
            'distance' => $this->distance,
        ];
    }

}
