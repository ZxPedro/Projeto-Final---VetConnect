<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{

    public function viewCreatePets()
    {
        return view('pets.pets_create');
    }

    public function postCreatePet(Request $request)
    {
        // dd($request);
    }
}
