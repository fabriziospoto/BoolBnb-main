<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class View extends JsonResource {

    /*
        api for chartjs
    */

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'views' => $this->views,
            'view_date' => $this->view_date,
        ];
    }
}
