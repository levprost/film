<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'media_id' => 'required|exists:media,id',
        'note_nmbr' => 'required|numeric|min:1|max:5',
        'comment' => 'required|string|max:255',
    ]);

    Note::create([
        'media_id' => $request->input('media_id'),
        'user_id' => Auth::id(), 
        'note_nmbr' => $request->input('note_nmbr'),
        'comment' => $request->input('comment'),
    ]);

    return redirect()->route('media.show', $request->input('media_id'))
        ->with('success', 'Commentaire ajouté avec succès.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
