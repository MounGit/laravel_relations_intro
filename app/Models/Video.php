<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = "videos";

    protected $fillable = ["url", "img", "duration", "title", "description"];

    public function commentaires(){
        return $this->hasMany(Commentaire::class);
        // tableau pour stocker les comments 
    }
}
