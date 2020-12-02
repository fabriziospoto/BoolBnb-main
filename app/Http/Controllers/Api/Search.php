<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\ApartmentPromotion;
use App\Http\Controllers\Controller;
use App\Http\Resources\Search as SearchResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Search extends Controller {
    public function index() {

        //   Visualizzo appartamenti con visible = true
        /* $search = Apartment::where('visible', true)->get();
        return SearchResources::collection($search); */

        //   Query per trovare tutti gli appartamenti in promo
        $apartments_promo = Apartment::query()->join('apartment_promotion', 'apartments.id', '=', 'apartment_promotion.apartment_id')
            ->select('*')
            ->where('visible', true)
            ->where('started_at', '<=', NOW())
            ->where('ended_at', '>=', NOW())
            ->get();
        //  Var con numero appartamenti promo
        $num_promo = count($apartments_promo);

        // Inserisco in un array tutti gli id degli appartamenti in promo
        $apartment_promo_id = [];
        foreach ($apartments_promo as $apartment_promo) {
            $apartment_promo_id[] = $apartment_promo->apartment_id;
        }

        //   Query per trovare tutti gli appartamenti NO PROMO a cui faccio UNION
        // con gli appartamenti PROMO (promo in fondo ora)
        if (count($apartments_promo) > 0) {
            $apartments_no_promo = Apartment::query()
                ->where('visible', true)
                ->whereNotIn('id', $apartment_promo_id)
                ->union($apartment_promo)
                ->get();
        } else {
            $apartments_no_promo = Apartment::query()
                ->where('visible', true)
                ->whereNotIn('id', $apartment_promo_id)
                ->get();
        }
        //  Var con numero TOTALE appartamenti e numero app NO PROMO
        $num_total = count($apartments_no_promo);
        $num_no_promo = $num_total - $num_promo;

        //   Ciclo tutti gli appartamenti risultanti dalla query se indice minore di numero app NO PROMO
        // aggiungo un campo alla collection ['promo'] settato a false, altrimenti a true
        for ($i = 0; $i < $num_total; $i++) {
            if ($i < $num_no_promo) {
                $apartments_no_promo[$i]['promo'] = false;
            } else {
                $apartments_no_promo[$i]['promo'] = true;
            }
        }

        //   Reverse della collection
        // App PROMO prima
        $apartments_first_promo = $apartments_no_promo->reverse();

        return SearchResources::collection($apartments_first_promo);

    }

    public function show($lat, $long, $radius=20) {
        $query = Apartment::geofence($lat, $long, 0, $radius)
            ->where('visible', true);
        $all = $query->get();
        return SearchResources::collection($all);
    }

}
