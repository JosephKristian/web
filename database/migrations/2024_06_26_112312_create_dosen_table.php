<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('fakultas');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menambahkan relasi ke tabel users
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('dosen');
    }
};
