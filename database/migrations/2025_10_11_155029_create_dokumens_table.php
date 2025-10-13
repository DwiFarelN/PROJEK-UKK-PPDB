<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftaran_id');
            $table->string('file');
            $table->timestamps();

            // Relasi ke pendaftarans
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
