<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Typology;
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
            'typology_id' => 'required|array',
            'typology_id.*' => 'exists:typologies,id',
        ],
        [
            'photo.required' => "The photo field is required.",
            'photo.string' => "The file must be a string.",
            'photo.max' => "The image cannot exceed 2048 characters.",

            'piva.required' => "The VAT number field is required.",
            'piva.numeric' => "The VAT number must be a number.",
            'piva.digits' => "The VAT number must be 11 digits.",
            'piva.unique' => "The VAT number entered is already registered.",

            'adress.required' => "The address field is required.",
            'adress.string' => "The address must be a string.",
            'adress.max' => "The address cannot exceed 255 characters.",
        ]);
    }
    public function showRegistrationForm(){
        $typologies = Typology::all();
        return view('auth.register', compact('typologies'));
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'photo' => $data['photo'],
            'piva' => $data['piva'],
            'adress' => $data['adress'],
        ]);

        $user->typologies()->sync($data['typology_id']);

        return $user;
    }
}
