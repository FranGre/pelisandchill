<?php

namespace App\Http\Controllers;

use App\Models\Film;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $films = Film::all();
        return view('welcome', compact('films'));
    }
}
