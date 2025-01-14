<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Media;
use App\Models\User;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['note_nmbr','comment','media_id','user_id'];
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
