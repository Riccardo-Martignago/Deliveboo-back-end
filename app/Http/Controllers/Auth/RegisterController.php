<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['required', 'string', 'max:2048'],
            'piva' => ['required', 'numeric', 'digits:11', 'unique:users'],
            'adress' => ['required', 'string', 'max:255'],
        ], [
            'photo.required' => "Il campo foto è obbligatorio.",
            'photo.string' => "Il file deve essere una stringa.",
            'photo.max' => "L'immagine non può superare i 2048 caratteri.",

            'piva.required' => "Il campo Partita IVA è obbligatorio.",
            'piva.numeric' => "La Partita IVA deve essere un numero.",
            'piva.digits' => "La Partita IVA deve essere composta da 11 cifre.",
            'piva.unique' => "La Partita IVA inserita è già registrata.",

            'adress.required' => "Il campo indirizzo è obbligatorio.",
            'adress.string' => "L'indirizzo deve essere una stringa.",
            'adress.max' => "L'indirizzo non può superare i 255 caratteri.",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Validazione dei dati
        $this->validator($data)->validate();

        // Creazione dell'utente
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'photo' => $data['photo'],
            'piva' => $data['piva'],
            'adress' => $data['adress'],
        ]);
    }
}
