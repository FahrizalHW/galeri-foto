<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likefotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('FotoId')->constrained('fotos')->onDelete('cascade');
            $table->foreignId('UserId')->constrained('users')->onDelete('cascade');
            $table->date('TanggalLike');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likefotos');
    }
};
