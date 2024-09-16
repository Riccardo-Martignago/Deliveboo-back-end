<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    public function index()
    {
        // Carica tutte le tipologie insieme ai ristoranti associati
        $dishes = Dish::all();

        return response()->json($dishes);
    }
}
