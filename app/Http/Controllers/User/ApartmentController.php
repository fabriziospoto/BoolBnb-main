<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\Category;
use App\Http\Controllers\Controller;
use App\Image;
use App\Promotion;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ApartmentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $apartments = Apartment::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('user.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        /* acquisisco tutti i service */
        $services = Service::all();
        $categories = Category::all();
        /* torno alla view create.blade.php e gli passo i services*/
        return view('user.apartments.create', compact('services', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = request()->all();

        $this->validation();

        $data['user_id'] = Auth::id();
        $data['created_at'] = Carbon::now();

        // dati appartamento (senza immagini)
        $newApartment = new Apartment;
        $newApartment->fill($data);
        $result = $newApartment->save();

        $id = $newApartment->id;

        if (!empty($data['services'])) {
            $newApartment->services()->attach($data['services']);
        }

        if ($result) {
            // return redirect(route('apartments.index'));
            return redirect(route('image.create', compact('id')));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment) {

        /* Acquisisco tutte le promozioni attive in questo momento */
        $promotions = Promotion::all();

        //   tutte le promozioni correnti
        $all_promos = DB::select('SELECT * FROM apartment_promotion WHERE apartment_id =' . $apartment->id . ' AND NOW() <= ended_at');

        return view('user.apartments.show', compact('apartment', 'promotions', 'all_promos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment) {

        $services = Service::all();
        $categories = Category::all();

        return view('user.apartments.edit', compact('apartment', 'services', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment) {
        $data = request()->all();
        $this->validation();

        $data['updated_at'] = Carbon::now();

        if (!empty($data['services'])) {
            $apartment->services()->sync($data['services']);
        } else {
            $apartment->services()->detach();
        }

        $result = $apartment->update($data);

        if ($result) {
            return redirect(route('apartments.index'))->with('status', "{$apartment->user->name} hai modificato correttamente l'appartamento");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment) {

        // prima di cancellare apartment eliminiamo la cartella locale delle immagini (identificata con id appartamento)
        File::deleteDirectory(public_path('/upload/' . $apartment->user_id . '/' . $apartment->id));

        //   rimozione appartamento dal db
        $apartment->delete();

        return redirect()->route('apartments.index')->with('status', 'Hai cancellato correttamente l\'appartamento ' . $apartment->id);
    }

    public function toggle($id) {

        $apartment = Apartment::findOrFail($id);
        $apartment->visible = !$apartment->visible;
        $apartment->save();
        return redirect(route('apartments.index'));

    }

    public function imagecreate($id) {

        $apartment = Apartment::findOrFail($id);
        return view('user/apartments/images/image-create', compact('apartment'));

    }

    public function imageedit(Apartment $apartment) {
        return view('user/apartments/images/image-edit', compact('apartment'));

    }

    public function imagedelete(Image $image) {
        // cancelliamo il file locale
        File::delete(public_path($image->img));
        // cancelliamo il record dal db
        $image->delete();
        return redirect(route('image.edit', $image->apartment_id));
    }

    public function imageupload(Request $request) {
        //controllare che il db abbia al massimo 5 img per appartamento
        $imageName = $request->img->getClientOriginalName();
        $imageName = str_replace(" ", "-", $imageName);
        $url = '/upload/' . Auth::id() . '/' . $request->apartment_id;
        $request->img->move(public_path($url), $imageName);
        // dati immagine
        $newImage = new Image;
        $newImage->apartment_id = $request->apartment_id;
        $newImage->img = $url . '/' . $imageName;
        $newImage->save();
        return response()->json(['uploaded' => '/upload/' . $imageName]);

    }

    /* ********** Validation */

    public function validation() {
        request()->validate([
            'title' => 'required|min:10|max:100',
            'description' => 'required|min:5|max:2000',
            'address' => 'required|min:5|max:200',
            'size' => 'required|numeric|min:10|max:500',
            'room_number' => 'required|min:1|max:20',
            'bed_number' => 'required|min:1|max:50',
            'bath_number' => 'required|min:1|max:20',
            'services' => 'required',
        ],
            [
                'title.required' => 'Titolo non può essere vuoto',
                'title.max' => 'Titolo non può essere più lungo di :max caratteri',
                'title.min' => 'Titolo non può essere più corto di :min caratteri',
                'description.required' => 'Descrizione non può essere vuoto',
                'description.max' => 'Descrizione non può essere più lungo di :max caratteri',
                'description.min' => 'Descrizione non può essere più corto di :min caratteri',
                'address.required' => 'Indirizzo non può essere vuoto',
                'address.max' => 'Indirizzo non può essere più lungo di :max caratteri',
                'address.min' => 'Indirizzo non può essere più corto di :min caratteri',
                'size.required' => 'Superficie non può essere vuota',
                'size.numeric' => 'Superficie deve essere numerico',
                'size.max' => 'Superficie non può essere più di :max',
                'size.min' => 'Superficie non può essere meno di :min',
                'room_number.required' => 'Numero stanze non può essere vuoto',
                'room_number.max' => 'Numero stanze non può essere più di :max',
                'room_number.min' => 'Numero stanze non può essere meno di :min',
                'bed_number.required' => 'Numero letti non può essere vuoto',
                'bed_number.max' => 'Numero letti non può essere più di :max',
                'bed_number.min' => 'Numero letti non può essere meno di :min',
                'bath_number.required' => 'Numero bagni non può essere vuoto',
                'bath_number.max' => 'Numero bagni non può essere più di :max',
                'bath_number.min' => 'Numero bagni non può essere meno di :min',
                'services.required' => 'Selezionare almeno un servizio',
            ]);
    }
}
