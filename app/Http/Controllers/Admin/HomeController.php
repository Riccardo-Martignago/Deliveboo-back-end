<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller{

    protected $validationRules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email|max:255',
        'password' => 'required|string|min:8',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'piva' => 'required|numeric|digits:11|unique:users,piva',
        // 'alimentazione' => 'required|string|max:255',
        'adress' => 'required|string|max:255',
    ];

    protected $validationMessages = [
        'name.required' => 'Il campo nome è obbligatorio.',
        'name.string' => 'Il nome deve essere una stringa.',
        'name.max' => 'Il nome non può superare i 255 caratteri.',

        'email.required' => "Il campo email è obbligatorio.",
        'email.email' => "Devi inserire un indirizzo email valido.",
        'email.unique' => "L'email inserita è già registrata.",
        'email.max' => "L'email non può superare i 255 caratteri.",

        'password.required' => "Il campo password è obbligatorio.",
        'password.string' => "La password deve essere una stringa.",
        'password.min' => "La password deve contenere almeno 8 caratteri.",

        'photo.required' => "Il campo foto è obbligatorio.",
        'photo.string' => "Il file caricato deve essere un'immagine.",
        'photo.mimes' => "L'immagine deve essere in formato: jpeg, png, jpg, gif.",
        'photo.max' => "L'immagine non può superare i 2048 KB.",

        'piva.required' => "Il campo Partita IVA è obbligatorio.",
        'piva.numeric' => "La Partita IVA deve essere un numero.",
        'piva.digits' => "La Partita IVA deve essere composta da 11 cifre.",
        'piva.unique' => "La Partita IVA inserita è già registrata.",

        // 'alimentazione.required' => "Il campo alimentazione è obbligatorio.",
        // 'alimentazione.string' => "Il campo alimentazione deve essere una stringa.",
        // 'alimentazione.max' => "Il campo alimentazione non può superare i 255 caratteri.",

        'adress.required' => "Il campo indirizzo è obbligatorio.",
        'adress.string' => "L'indirizzo deve essere una stringa.",
        'adress.max' => "L'indirizzo non può superare i 255 caratteri.",
    ];

    public function index()
    {
        //
        $users = User::all();

        return view('admin.user.index',compact('users'));
    }

    public function show(User $user ,Order $order)
    {
                // Verifica se l'utente autenticato è lo stesso che si sta tentando di visualizzare
                if (Auth::id() !== $user->id) {
                    abort(403, 'La pagina a cui stai tentando di accedere è inesistente.');
                }
        return view('admin.user.show', compact('user','order'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules,$this->validationMessages);

        $newUser = new User($data);
        $newUser->name = $data['name'];
        $newUser->email = $data['email'];
        $newUser->password = $data['password'];
        $newUser->piva = $data['piva'];
        // $newUser->alimentazione = $data['alimentazione'];
        $newUser->adress = $data['adress'];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $newUser->photo = $fileName;
        }

        $newUser->save();

        return redirect()->route('pages.show',$newUser);
    }
}
