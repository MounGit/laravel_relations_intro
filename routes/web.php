<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\VideoController;
use App\Models\Commentaire;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $video = Video::first();
    // dd($video->commentaires);
    return view('template.main');
});


Route::resource('/videos', VideoController::class);

Route::resource('/commentaires', CommentaireController::class);