<?php

namespace App\Http\Controllers;
use App\Models\Langue;
use App\Models\Syndrome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

class LangueController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('categorie');

        // Récupérer l'image de la langue pour la catégorie sélectionnée
        $langue = $selectedCategory ? Langue::where('categorie', $selectedCategory)->first() : null;

        // Récupérer les syndromes pour la catégorie sélectionnée
        $syndromes = $selectedCategory
            ? Syndrome::where('categorie', $selectedCategory)->get()
            : collect();

        // Récupérer toutes les catégories pour la navigation
        $allCategories = Syndrome::pluck('categorie')->unique()->filter();

        return view('langues.index', compact('syndromes', 'allCategories', 'selectedCategory', 'langue'));
    }

    public function manage()
    {
        // Récupérer toutes les entrées de la table langues
        $langues = Langue::all();

        return view('langues.manage', compact('langues'));
    }

    public function updateImage(Request $request, $id)
    {
        $langue = Langue::findOrFail($id);

        // Valider la requête
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Limite à 2MB
        ]);

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($langue->image && File::exists(public_path('langue/' . basename($langue->image)))) {
                File::delete(public_path('langue/' . basename($langue->image)));
            }

            // Stocker la nouvelle image dans public/langues/
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('langue'), $imageName);

            // Mettre à jour le chemin de l'image dans la base de données
            $langue->image = 'langue/' . $imageName;
            $langue->save();
        }

        return redirect()->route('langues.manage')->with('success', 'Image mise à jour avec succès !');
    }
}
