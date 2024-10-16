<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['JudulFoto', 'DeskripsiFoto','TanggalUnggah',
    'LokasiFile','AlbumId','UserId'];

    public function album()
    {
        return $this->belongsTo(Album::class,'AlbumId');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'UserId');
    }


    public function likes()
    {
        return $this->hasMany(LikeFoto::class,'FotoId');
    }

    public function comments()
    {
        return $this->hasMary(KomentarFoto::class,'FotoId');
    }
}
