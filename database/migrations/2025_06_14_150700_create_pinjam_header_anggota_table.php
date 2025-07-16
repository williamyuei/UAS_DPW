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
        Schema::create('pinjam_header_anggota', function (Blueprint $table) {
            $table->string('NoPinjam')->primary();
            $table->date('TglPinjam');
            $table->date('TglKembali');
            $table->string('KodeAnggota');
            $table->string('KodePetugas');

            $table->foreign('KodeAnggota')
                ->references('KodeAnggota')
                ->on('anggota')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('KodePetugas')
                ->references('KodePetugas')
                ->on('petugas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam__header__anggota');
    }
};
