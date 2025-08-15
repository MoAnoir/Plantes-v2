<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Simulation de création d'abonnement (paiement requis avant activation)
        $user->subscription()->create([
            'is_paid' => false, // Par défaut, non payé
            'expires_at' => null, // À définir après paiement
        ]);

        // Redirection vers une page de paiement (à implémenter)
        return redirect()->route('payment')->with('success', 'Inscription réussie ! Veuillez effectuer le paiement pour activer votre compte.');
    }

        
}