<?php

namespace App\Http\Controllers;
use App\Models\Syndrome;
use App\Models\Langue;
use Illuminate\Http\Request;

class SyndromeController extends Controller
{
    public function index()
    {
        $syndromes = Syndrome::with('formules')->get();

        // Passer les données à la vue
        return view('syndromes.index', compact('syndromes'));
    }
    // public function index(Request $request)
    // {
    //     $selectedCategory = $request->query('categorie');

    //     // Récupérer l'image de la langue pour la catégorie sélectionnée
    //     $langue = $selectedCategory ? Langue::where('categorie', $selectedCategory)->first() : null;

    //     // Récupérer les syndromes pour la catégorie sélectionnée
    //     $syndromes = $selectedCategory
    //         ? Syndrome::where('categorie', $selectedCategory)->get()
    //         : Syndrome::all();

    //     // Récupérer toutes les catégories pour la navigation
    //     $allCategories = Syndrome::pluck('categorie')->unique()->filter();

    //     return view('syndromes.index', compact('syndromes', 'allCategories', 'selectedCategory', 'langue'));
    // }

    public function create()
    {
        return view('syndromes.create');
    }

    public function show($id)
    {
        // Charger le syndrome avec ses formules associées
        $syndrome = Syndrome::with('formules')->findOrFail($id);

        // Passer les données à la vue
        return view('syndromes.show', compact('syndrome'));
    }
}