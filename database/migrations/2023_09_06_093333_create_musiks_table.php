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
        Schema::create('musiks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_musik');
            $table->string('tipe_file');
            $table->string('nama_artis');
            $table->string('file_musik');
            $table->string('gambar_album');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musiks');
    }
};