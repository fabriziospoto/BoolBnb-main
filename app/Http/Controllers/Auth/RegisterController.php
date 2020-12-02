<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthday' => ['required'],
        ],

            [
                'name.required' => 'Nome non può essere vuoto',
                'name.max' => 'Nome non può essere più lungo di :max caratteri',
                'name.min' => 'Nome non può essere più corto di :min caratteri',
                'lastname.required' => 'Cognome non può essere vuoto',
                'lastname.max' => 'Cognome non può essere più lungo di :max caratteri',
                'lastname.min' => 'Cognome non può essere più corto di :min caratteri',
                'email.required' => 'Email non può essere vuoto',
                'email.max' => 'Email non può essere più lungo di :max caratteri',
                'email.email' => 'Formato email non valido',
                'password.required' => 'Password non può essere vuoto',
                'password.min' => 'Password non può essere più lunga di :min caratteri',
                'birthday.required' => 'Data di nascita non può essere vuota',

            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {

        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
        ]);
    }
}
