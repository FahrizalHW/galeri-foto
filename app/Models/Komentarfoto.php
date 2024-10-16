<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentarfoto extends Model
{
    use HasFactory;

    protected $fillable = ['FotoId', 'UserId','IsiKomentar','TanggalKomentar'];

    public function foto()
    {
        return $this->belongsTo(Album::class,'FotoId');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'UserId');
    }

}
