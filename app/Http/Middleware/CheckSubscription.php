<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    // public function handle(Request $request, Closure $next)
    // {
    //     $user = Auth::user();

    //     if ($user && $user->subscription) {
    //         if (!$user->subscription->is_paid || ($user->subscription->expires_at && $user->subscription->expires_at < now())) {
    //             return redirect()->route('subscriptions.expired')->with('error', 'Votre abonnement n\'est pas actif ou a expiré. Veuillez effectuer un paiement.');
    //         }
    //     } else {
    //         return redirect()->route('presentation')->with('error', 'Vous devez vous abonner pour accéder au contenu.');
    //     }

    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Si l'utilisateur n'est pas connecté, redirige vers /login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder au contenu.');
        }

        // Si l'utilisateur a une subscription et qu'elle n'est pas active
        if ($user->subscription) {
            if (!$user->subscription->is_paid || ($user->subscription->expires_at && $user->subscription->expires_at < now())) {
                return redirect()->route('subscriptions.expired')->with('error', 'Votre abonnement n\'est pas actif ou a expiré. Veuillez effectuer un paiement.');
            }
        } else {
            return redirect()->route('subscriptions.expired')->with('error', 'Vous devez activer votre abonnement pour accéder au contenu.');
        }

        return $next($request);
    }

    
}