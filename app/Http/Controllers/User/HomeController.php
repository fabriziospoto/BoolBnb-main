<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {
        return view('user.home');
    }

    public function show(User $user) {
        return view('user.show', compact('user'));
    }

    public function update(Request $request, User $user) {
        $data = $request->all();
        $result = $user->update($data);
        if($result){
            return redirect(route('home'))->with('edit', "$user->name hai modificato i tuoi dati");
        }
    }

}
