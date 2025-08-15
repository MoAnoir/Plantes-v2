<?php

namespace App\Http\Controllers;

use App\Models\Formule;

class FormuleController extends Controller
{
    public function index()
    {
        $formules = Formule::with('plantes')->get(); // Charge toutes les formules avec leurs plantes
        return view('formules.index', compact('formules'));
    }

    public function create()
    {
        return view('formules.create');
    }

    public function show($nom)
    {
        $formule = Formule::with(['syndromes', 'plantes'])->where('nom', $nom)->firstOrFail();
        return view('formules.show', compact('formule'));
    }
    public function showById($id){
        $formule = Formule::with(['syndromes', 'plantes'])->findOrFail($id);
        return view('formules.show', compact('formule'));
    }
    
}