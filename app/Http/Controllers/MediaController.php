<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Genre;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::orderBy('created_at','desc')->get();
        return view('media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('media.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'media_title' => 'required',
            'media_url' => 'nullable',
            'media_description' => 'required',
            'media_photo'=>'required|image|mimes:jpeg,png,jpg,gif,jfif,svg',
            'media_type'=>'required',
            'genre_id' => 'required',
        ]);
        $filename = ""; 
        if ($request->hasFile('media_photo')) { 
        // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg" 
          $filenameWithExt = $request->file('media_photo')->getClientOriginalName(); 
          $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
        // On récupère l'extension du fichier, résultat $extension : ".jpg" 
          $extension = $request->file('media_photo')->getClientOriginalExtension(); 
        // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg" 
          $filename = $filenameWithExt. '_' .time().'.'.$extension; 
        // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin 
        ///storage/app 
          $request->file('media_photo')->storeAs('uploads', $filename); 
        } else { 
          $filename = Null; 
        } 
        Media::create([
            'media_title' => $request->media_title,
            'media_url' => $request->media_url,
            'media_description' => $request->media_description,
            'media_photo' => $filename,
            'media_type' => $request->media_type,
            'genre_id' => $request->genre_id,
        ]);
        return redirect()->route('media.index')
            ->with('success','Media ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,Request $request)
    {
        $note = Note::where('media_id',$id)->get();
        $user = User::where('id',$id)->get();
        $media = Media::where('id',$id)->get();

        $count = $note->count();
        if ($count > 0) {
            $final_note = $note->sum('note_nmbr') / $count;
        } else {
            $final_note = 0;
        }

        

        return view('media.show', compact('note','final_note','media'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $genres = Genre::all();
       $media = Media::findOrFail($id);
       return view('media.edit', compact('genres','media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mediaUpdate = Media::findOrFail($id);
        
        
        $validateData = $request->validate([
            'media_title' => 'required',
            'media_url' => 'nullable',
            'media_description' => 'required',
            'media_photo'=>'nullable|image|mimes:jpeg,png,jpg,gif,jfif,svg',
            'media_type'=>'required',
            'genre_id' => 'nullable',
        ]);
        $filename = ""; 
        if ($request->hasFile('media_photo')) { 
        // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg" 
          $filenameWithExt = $request->file('media_photo')->getClientOriginalName(); 
          $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
        // On récupère l'extension du fichier, résultat $extension : ".jpg" 
          $extension = $request->file('media_photo')->getClientOriginalExtension(); 
        // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg" 
          $filename = $filenameWithExt. '_' .time().'.'.$extension; 
        // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin 
        ///storage/app 
          $request->file('media_photo')->storeAs('uploads', $filename); 

          $validateData['media_photo'] = $filename;
        } else { 
          $validateData['media_photo'] = $mediaUpdate->media_photo; 
        } 
        $mediaUpdate->update($validateData);
        return redirect()->route('media.index')
            ->with('success','Media ajouté avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect('/media')->with('success', 'Produit supprimé avec succès');
    }
}
