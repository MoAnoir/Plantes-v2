<?php

namespace App\Http\Controllers;

use App\Models\Plante;
use Illuminate\Http\Request;

class PlanteController extends Controller
{
    public function index()
    {
        $plantes = Plante::with('formules')->get();
        return view('plantes.index', compact('plantes'));
    }

    public function create()
    {
        $plantes = Plante::all(); // Charge toutes les plantes pour la liste déroulante
        return view('plantes.create', compact('plantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_chinois' => 'nullable|string|max:255',
            'nom_latin' => 'nullable|string|max:255',
            'partie_utilisee' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validation pour l'image
        ]);

        // Collect the validated data
        $data = $request->only('nom', 'nom_chinois', 'nom_latin', 'partie_utilisee', 'description');

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Nom unique pour l'image
            $imagePath = 'plantes/' . $imageName; // Chemin relatif dans public/plantes
            $image->move(public_path('plantes'), $imageName); // Déplace l'image dans public/plantes
            $data['image'] = $imagePath; // Stocke le chemin relatif dans la base de données
        }

        // Create a new 'Plante' record with the validated data
        Plante::create($data);

        // Redirect to the plantes index page with a success message
        return redirect()->route('plantes.index')->with('success', 'Plante ajoutée avec succès !');
    }

    public function edit($id)
    {
        $plante = Plante::findOrFail($id); // Charge la plante à modifier
        $plantes = Plante::all(); // Charge toutes les plantes pour la liste déroulante
        return view('plantes.create', compact('plante', 'plantes'));
    }

    public function update(Request $request, $id)
    {
        $plante = Plante::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'nom_chinois' => 'nullable|string|max:255',
            'nom_latin' => 'nullable|string|max:255',
            'partie_utilisee' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validation pour l'image
        ]);

        // Collect the validated data
        $data = $request->only('nom', 'nom_chinois', 'nom_latin', 'partie_utilisee', 'description');

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($plante->image && file_exists(public_path($plante->image))) {
                unlink(public_path($plante->image)); // Supprime l'ancienne image
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Nom unique pour l'image
            $imagePath = 'plantes/' . $imageName; // Chemin relatif dans public/plantes
            $image->move(public_path('plantes'), $imageName); // Déplace l'image dans public/plantes
            $data['image'] = $imagePath; // Stocke le chemin relatif dans la base de données
        }

        // Update the plante with the new data
        $plante->update($data);

        // Redirect to the plantes index page with a success message
        return redirect()->route('plantes.index')->with('success', 'Plante modifiée avec succès !');
    }
    public function show($nom_latin)
    {
        $plante = Plante::where('nom_latin', $nom_latin)->firstOrFail(); // Recherche la plante par nom_latin
        return view('plantes.show', compact('plante'));
    }
}