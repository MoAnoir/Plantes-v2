<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    

    public function dashboard()
    {
        $users = User::with('subscription')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function showCreateUserForm()
    {
        return view('admin.create-user');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'expires_at' => 'required|date|after_or_equal:today',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'is_paid' => true,
            'expires_at' => $request->expires_at,
        ]);

        $user->update(['subscription_id' => $subscription->id]);

        return redirect()->route('admin.dashboard')->with('success', 'Utilisateur créé et abonnement activé.');
    }

    public function showCreateAdminForm()
    {
        return view('admin.create-admin');
    }

    public function createAdmin(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard')->with('error', 'Vous n\'êtes pas autorisé à créer un administrateur.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'expires_at' => 'required|date|after_or_equal:today',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true,
        ]);

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'is_paid' => true,
            'expires_at' => $request->expires_at,
        ]);

        $user->update(['subscription_id' => $subscription->id]);

        return redirect()->route('admin.dashboard')->with('success', 'Administrateur créé et abonnement activé.');
    }

    public function toggleSubscription(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $validationRules = $user->subscription && !$user->subscription->is_paid ? ['expires_at' => 'required|date|after_or_equal:today'] : [];
        $request->validate($validationRules);

        if ($user->subscription) {
            $user->subscription->update([
                'is_paid' => !$user->subscription->is_paid,
                'expires_at' => $user->subscription->is_paid ? null : ($request->expires_at ?? now()->addYear()),
            ]);
        } else {
            $subscription = Subscription::create([
                'user_id' => $user->id,
                'is_paid' => true,
                'expires_at' => $request->expires_at ?? now()->addYear(),
            ]);
            $user->update(['subscription_id' => $subscription->id]);
        }

        return redirect()->back()->with('success', 'Abonnement mis à jour avec succès.');
    }

    public function showEditUserForm($userId)
    {
        $user = User::findOrFail($userId);
        return response()->json(['user' => $user]);
    }

    public function updateUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return response()->json(['success' => true, 'message' => 'Utilisateur mis à jour avec succès.']);
    }

    public function destroyUser($userId)
{
    $user = User::findOrFail($userId);
    if ($user->is_admin && auth()->user()->id !== $userId) {
        return response()->json(['error' => 'Vous ne pouvez pas supprimer un autre administrateur.'], 403);
    }

    if ($user->subscription) {
        $user->subscription->delete();
    }
    $user->delete();

    return response()->json(['success' => true, 'message' => 'Utilisateur supprimé avec succès.']);
}
}