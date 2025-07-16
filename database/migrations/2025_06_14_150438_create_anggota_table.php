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
        Schema::create('anggota', function (Blueprint $table) {
            $table->string('KodeAnggota')->primary();
            $table->string('Nama');
            $table->string('TTL');
            $table->text('Alamat');
            $table->string('KodePos');
            $table->string('NoTelp')->nullable();
            $table->string('Hp');
            $table->date('TglDaftar');
            $table->string('Email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
