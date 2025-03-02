<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendEmailVerificationJob;

class UserManagementController extends Controller
{
    /**
     * Afficher tous les utilisateurs.
     */
    public function index()
    {
        $users = User::paginate("10");
        return view('usermanagement.index', compact('users'));
    }

    /**
     * Afficher le formulaire de création d'un utilisateur.
     */
    public function create()
    {
        return view('usermanagement.create');
    }

    /**
     * Enregistrer un nouvel utilisateur.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'role' => 'nullable',
        'phone' => 'nullable|numeric',
        'location' => 'nullable|string|max:255',
        'about_me' => 'nullable|string|max:500',
    ]);
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->role = $validatedData['role'];
    $user->phone = $validatedData['phone'] ?? null;
    $user->location = $validatedData['location'] ?? null;
    $user->about_me = $validatedData['about_me'] ?? null;

    $user->save();
    SendEmailVerificationJob::dispatch($user);
    return redirect()->route('user-management.index')->with('success', 'Utilisateur créé avec succès.');
}
/**
     * Mettre à jour un utilisateur existant.
     */
    public function update(Request $request, User $user_management)
    {
        $user_management->role = $request->role ; 
        $user_management->save();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_management->id,
            'password' => 'nullable|min:6|confirmed',
            'phone' => 'nullable|numeric',
            'location' => 'nullable|string|max:255',
            'about_me' => 'nullable|string|max:500',
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'about_me' => $request->about_me,
        ];
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        $user_management->update($data);
    
        return redirect()->route('user-management.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }
    /**
     * Afficher un utilisateur spécifique.
     */
    public function show(User $user_management)
    {
        return view('usermanagement.show', compact('user_management'));
    }

    /**
     * Afficher le formulaire d'édition d'un utilisateur.
     */
    public function edit(User $user_management)
    {
        return view('usermanagement.edit', compact('user_management'));
    }

    

    /**
     * Supprimer un utilisateur.
     */
    public function destroy(User $user_management)
    {
        $user_management->delete();
        return redirect()->route('user-management.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
