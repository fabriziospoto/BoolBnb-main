<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Resources\View as ViewResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class View extends Controller {

    public function index($id) {

        /* conversione in json della query */
        // query db delle visualizzazioni per data di un singolo appartamento

        $views = DB::select('select count(view_date) as views,view_date from views where apartment_id=' . $id . ' group by view_date ');

        return ViewResources::collection($views);
    }

}
