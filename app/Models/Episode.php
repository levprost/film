<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory; 
    protected $fillable = ['episode_name', 'episode_nmbr', 'media_id']; 
    public function users() 
    { 
        return $this->belongsToMany(User::class); 
    } 
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id_media');
    }
}
