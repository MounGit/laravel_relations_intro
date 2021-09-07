<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Video;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaire = Commentaire::all();
        return view('pages.commentaire.comment', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video = Video::all();
        return view('pages.commentaire.commentCreate', compact('video'));

    // vlue du select id name video_id
// option value id
    // balise titre 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "datePublication" => "required",
            "contenu" => "required",
            "video_id" => "required"
        ]);
        $commentaire = new Commentaire;
        $commentaire->nom = $request->nom;
        $commentaire->prenom = $request->prenom;
        $commentaire->datePublication = $request->datePublication;
        $commentaire->contenu = $request->contenu;
        $commentaire->video_id = $request->video_id;
        $commentaire->save();
        return redirect()->route('commentaires.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        $video = Video::all();
        return view('pages.commentaire.commentShow', compact('commentaire', 'video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        $video = Video::all();
        return view('pages.commentaire.commentEdit', compact('commentaire', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "datePublication" => "required",
            "contenu" => "required",
            "video_id" => "required"
        ]);
        $commentaire->nom = $request->nom;
        $commentaire->prenom = $request->prenom;
        $commentaire->datePublication = $request->datePublication;
        $commentaire->contenu = $request->contenu;
        $commentaire->video_id = $request->video_id;
        $commentaire->save();
        return redirect()->route('commentaires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaires.index')->with('message', 'Aiiight commentaire supprimé!');;
    }
}
