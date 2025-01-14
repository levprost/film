<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['media_title','media_photo','media_url','media_type','media_description','genre_id'];

    public function genre() 
    { 
        return $this->belongsTo(Genre::class); 
    } 
}
