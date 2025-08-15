<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $allSyndromes = \App\Models\Syndrome::all(); // Récupère tous les syndromes
        $syndromes = []; // Les résultats de recherche, si applicable
        return view('welcome', compact('allSyndromes', 'syndromes'));
    }
}
