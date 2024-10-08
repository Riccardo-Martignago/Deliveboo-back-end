<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('typologies');

        // Filtra per tipologie se il parametro è presente
        if ($request->has('typology_id')) {
            $typologyId = $request->input('typology_id');
            $query->whereHas('typologies', function ($query) use ($typologyId) {
                $query->where('typologies.id', $typologyId);
            });
        }

        $users = $query->paginate(6);

        return response()->json($users);
    }

    public function show(){

        $user = User::paginate(6);

        return response()->json($user);
    }
}
