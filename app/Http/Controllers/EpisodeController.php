<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
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
        $media = Media::all();
        return view('episode.create',compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'episode_name' => 'required',
            'episode_nmbr' => 'required',
            'media_id' => 'required',
        ]);
        Episode::create([
            'episode_name' => $request->episode_name,
            'episode_nmbr' => $request->episode_nmbr,
            'media_id' => $request->media_id,
        ]);
        return redirect()->route('media.index')
            ->with('success','Episode ajouté avec succès');
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
