<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Media;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $genres = Genre::all();
       return view('genre.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre_name' => 'required',
        ]);
        Genre::create([
            'genre_name' => $request->genre_name,
        ]);
        return redirect()->route('genre.index')
            ->with('success', 'Genre ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $media = Media::where('genre_id',$id)->get();

        return view('genre.show',compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Media::findOrFail($id);
        return view('genre.edit', compact('genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateGenre = $request->validate([
            'genre_name' => 'required',
        ]);
        Genre::whereId($id)->update($updateGenre);
        return redirect()->route('genres.index')->with('success','La genre mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
