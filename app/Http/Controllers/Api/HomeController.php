<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $user = User::paginate(6);

        return response()->json($user);
    }

    public function show(){

        $user = User::paginate(6);

        return response()->json($user);
    }
}
