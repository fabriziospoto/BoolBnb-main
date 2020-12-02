<?php

namespace App\Http\Controllers\Guest;

use App\Apartment;
use App\ApartmentPromotion;
use App\Http\Controllers\Controller;
use App\Service;
use App\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    public function index() {

        /* IMPORTANTE ALMENO UN APPARTAMENTO IN PROMOZIONE
        APPARTAMENTI IN PROMO NUM MAX MINORE DI $home_max_apartment = 8 */

        $home_max_apartment = 8;

        //   Visualizzo appartamenti con visible = true
        /* $apartments = Apartment::where('visible', true)->get(); */

        $apartments_promo = Apartment::query()->join('apartment_promotion', 'apartments.id', '=', 'apartment_promotion.apartment_id')
            ->select('*')
            ->where('visible', true)
            ->where('started_at', '<=', NOW())
            ->where('ended_at', '>=', NOW())
            ->limit($home_max_apartment)
            ->get();

        /* $apartments_promo = ApartmentPromotion::query()->join('apartments', 'apartment_promotion.apartment_id', '=', 'apartments.id')
        ->select('*')
        ->where('visible', true)
        ->where('started_at', '<=', NOW())
        ->where('ended_at', '>=', NOW())
        ->limit($home_max_apartment)
        ->get(); */

        $num_apartments_promo = count($apartments_promo);
        $num_apartments_no_promo = $home_max_apartment - $num_apartments_promo;

        $apartment_promo_id = [];

        foreach ($apartments_promo as $apartment_promo) {
            $apartment_promo_id[] = $apartment_promo->apartment_id;
        }

        $apartments_no_promo = Apartment::where('visible', true)
            ->whereNotIn('id', $apartment_promo_id)
            ->limit($num_apartments_no_promo)
            ->get();

        return view('guest.home', compact('apartments_promo', 'apartments_no_promo'));

    }

    public function show($id) {
        $apartment = Apartment::where('id', $id)->first();
        $services = Service::where('id', $id)->get();

        // inserire record in views
        if (Auth::id() != $apartment->user_id) {
            $newView = new View;
            $newView['apartment_id'] = $apartment->id;
            $newView['view_date'] = Carbon::now('Europe/Rome');
            $newView->save();
        }

        return view('guest.show', compact('apartment', 'services'));
    }

    public function search(Request $request) {

        $query = $request['query'];
        return view('guest.search', compact('query'));
    }

}
