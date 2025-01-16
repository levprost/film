<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id === 2 ){
            $users = User::all();
            $role = Role::all();
            return view('user.index', compact('users','role'));
        }else{
            return redirect('/media');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) 
    { 
        if (Auth::user()->id === $user->id || Auth::user()->role_id === 2 ) {
            return view('user.edit', compact('user')); 
        }else{
            return redirect('/media')->with('error','No permission');
        }
    }
    public function editRole(User $user) 
    { 
        if (Auth::user()->role_id === 2 ) {
            return view('user.editrole', compact('user')); 
        }else{
            return redirect('/media')->with('error','No permission');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->id == $user->id){
            $request->validate([ 
            'name' => 'required|max:40',
          ]); 
            
          $user->update($request->all()); 
     
          return back()->with('message', 'Le compte a bien été modifié.'); 
        }else{
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }
    public function updateRole(Request $request, User $user)
    {
        if (Auth::user()->role_id === 2){
            $request->validate([ 
            'name' => 'required|max:40',
            'role_id' => 'required|integer|exists:roles,id' 
          ]); 
            
          $user->update($request->all()); 
     
          return back()->with('message', 'Le compte a bien été modifié.'); 
        }else{
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) 
    { 
    // on vérifie que c'est bien l'utilisateur connecté qui fait la demande de suppression 
    // (les id doivent être identiques)  
    if (Auth::user()->id == $user->id || Auth::user()->role_id === 2) { 
        $user->delete(); 
        return redirect()->route('/media')->with('message', 'Le compte a bien été supprimé'); 
    } else { 
     return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']); 
    } 
} 
}
