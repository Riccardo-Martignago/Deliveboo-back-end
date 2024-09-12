<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Typology;

class TypologyController extends Controller
{
    public function index()
    {
        // Carica tutte le tipologie insieme ai ristoranti associati
        $typologies = Typology::with('restaurants')->get();

        return response()->json($typologies);
    }

}
