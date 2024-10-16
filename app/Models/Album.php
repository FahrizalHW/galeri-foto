<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['NamaAlbum', 'DeskripsiFoto','TanggalDibuat','UserId'];

    public function user()
    {
        return $this->belongsTo(User::class,'UserId');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class,'AlbumId');
    }
}