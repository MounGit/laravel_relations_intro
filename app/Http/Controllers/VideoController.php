<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('pages.video.video', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.video.videoCreate');
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
            "url" => "required",
            "img" => "required",
            "description" => "required",
            "duration" => "required",
            "title" => "required"
        ]);
        $video = new Video;
        $video->url = $request->url;
        $video->img = $request->file('img')->hashName();
        $video->description = $request->description;
        $video->duration = $request->duration;
        $video->title = $request->title;
        $video->save();
        $request->file('img')->storePublicly('img', 'public');
        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('pages.video.videoShow', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('pages.video.videoEdit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            "url" => "required",
            "img" => "required",
            "description" => "required",
            "duration" => "required",
            "title" => "required"
        ]);
        Storage::disk('public')->delete('img'. $video->img);
        $video->url = $request->url;
        $video->img = $request->file('img')->hashName();
        $video->description = $request->description;
        $video->duration = $request->duration;
        $video->title = $request->title;
        $video->save();
        $request->file('img')->storePublicly('img', 'public');
        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Storage::disk('public')->delete('img'. $video->img);
        $video->delete();
        return redirect()->route('videos.index')->with('message', "C'est supprimé gros!");
    }
}
