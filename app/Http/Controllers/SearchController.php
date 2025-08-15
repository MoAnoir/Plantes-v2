<?php

namespace App\Http\Controllers;

use App\Models\Syndrome;
use App\Models\Toxication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $allSyndromes = Syndrome::all();
        $allToxications = Toxication::all();
        $syndromes = collect(); // Résultats vides par défaut

        return view('welcome', compact('allSyndromes', 'allToxications', 'syndromes'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $allSyndromes = Syndrome::all();
        $allToxications = Toxication::all();

        $syndromes = Syndrome::where('nom', 'like', "%$query%")
            ->orWhereHas('toxications', function ($q) use ($query) {
                $q->where('nom', 'like', "%$query%");
            })
            ->with('toxications')
            ->get();

        return view('welcome', compact('allSyndromes', 'allToxications', 'syndromes'));
    }
}