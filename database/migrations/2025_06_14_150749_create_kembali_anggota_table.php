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
        Schema::create('kembali_anggota', function (Blueprint $table) {
            $table->string('NoKembali')->primary();
            $table->string('NoPinjam');
            $table->date('TglKembali');
            $table->string('KodePetugas');

            $table->foreign('NoPinjam')
                ->references('NoPinjam')
                ->on('pinjam_header_anggota')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kembali__anggota');
    }
};
