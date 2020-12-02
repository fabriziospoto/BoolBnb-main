<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\ApartmentPromotion;
use App\Http\Controllers\Controller;
use App\Promotion;
use Braintree;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller {
    public function promo(Apartment $apartment, Promotion $promo) {

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $token = $gateway->ClientToken()->generate();

        return view('user.apartments.promo.payment', compact('token', 'apartment', 'promo'));
    }

    public function store(Request $request) {

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => Auth::user()->name,
                'lastName' => Auth::user()->lastname,
                'email' => Auth::user()->email,
            ],
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            $transaction = $result->transaction;

            $newApartmentPromotion = new ApartmentPromotion;
            $newApartmentPromotion->apartment_id = $request->apartment_id;
            $newApartmentPromotion->promotion_id = $request->promo_id;

            /* controllo se esistono già appartamenti con determinato id in tabella apartment_promotion */
            if (count(ApartmentPromotion::where('apartment_id', $request->apartment_id)->get())) {

                /* $max_id = DB::select('select max(id) as maxId from apartment_promotion where apartment_id= ' . $request->apartment_id); */

                // aquisisco oggetto dalla tabella apartment_promotion con data più recente
                /* $last_ended = DB::select('select ended_at from apartment_promotion where apartment_id=' .
                $request->apartment_id . ' and id = ' . $max_id[0]->maxId); */

                $last_ended = DB::select('select ended_at from apartment_promotion where apartment_id=' .
                    $request->apartment_id . ' order by ended_at desc limit 1 ');

                /* $last_ended = DB::select('select ended_at from apartment_promotion where apartment_id=' .
                $request->apartment_id); */

                //   se ultima data della tabella > di ORA
                if (Carbon::parse($last_ended[0]->ended_at) > Carbon::now()) {

                    // inserisco ultimo elemento a partire dall'ultima data utile
                    $newApartmentPromotion->started_at = Carbon::parse($last_ended[0]->ended_at);
                    $newApartmentPromotion->ended_at = Carbon::parse($last_ended[0]->ended_at)->addHours($request->promo_period);

                    // altrimenti inserisco elemento a partire da data corrente
                } else {
                    $newApartmentPromotion->started_at = Carbon::now();
                    $newApartmentPromotion->ended_at = Carbon::now()->addHours($request->promo_period);
                }
                /* altrimenti inserisco elemento a partire da data corrente */
            } else {

                $newApartmentPromotion->started_at = Carbon::now();
                $newApartmentPromotion->ended_at = Carbon::now()->addHours($request->promo_period);

            }

            $newApartmentPromotion->save();

            return redirect(route('apartments.show', $request->apartment_id))->with('success_message', 'Transazione eseguita con successo. ID: ' . $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }
    }
}
