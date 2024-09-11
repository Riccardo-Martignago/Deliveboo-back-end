<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Auth\Events\Validated;

class DishController extends Controller
{
    protected $validationRules = [
        'name'=>'required|string|max:255',
        'photo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description'=>'required|string',
        'price'=>'required|numeric|max:999999',
        'visible'=>'required|boolean',
        'user_id' =>'required|exists:users,id',
    ];
    protected $validationMessages = [
        'name.required' => 'Il campo nome è obbligatorio.',
        'name.string' => 'Il nome deve essere una stringa.',
        'name.max' => 'Il nome non può superare i 255 caratteri.',

        'price.required' => 'Il campo prezzo è obbligatorio.',
        'price.numeric' => 'Il prezzo deve essere un numero.',
        'price.max' => 'Il prezzo non può superare i 999999.',

        'photo.required' => 'Il campo foto è obbligatorio.',
        'photo.image' => 'Il file deve essere un\'immagine.',
        'photo.max' => 'L\'immagine non può superare i 2MB.',
    ];
    public function index()
    {

        $dishes = Dish::where('user_id', auth()->id())->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all();
        return view ( 'admin.dishes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //valida i dati
        $data = $request->validate($this->validationRules);
        //crea il nuovo piatto
        $dish = new Dish($data);
        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->price = $data['price'];
        $dish->visible = $data['visible'];
        $dish->user_id = auth()->id();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $dish->photo = $fileName;
        }

        $dish->save();

        return redirect()->route('admin.dishes.index')->with('success', 'Dish created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        //validazione
        {
            //validazione
            $validated = $request->validate([
                'name'=>'required|string|max:255',
                'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description'=>'required|string',
                'price'=>'required|numeric',
                'visible'=>'required|boolean',
            ]);
            $dish->update($validated);
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $fileName);
                $dish->photo = $fileName;
            }
            if ($dish->user_id !== auth()->id()) {
                return redirect()->route('admin.dishes.index')->with('error', 'You are not authorized to update this dish.');
            }
            $dish->user_id = auth()->id();
            $dish->save();
            return redirect()->route('admin.dishes.show', $dish)->with('success', 'Dish updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('success', 'Dish deleted!');
    }
}
