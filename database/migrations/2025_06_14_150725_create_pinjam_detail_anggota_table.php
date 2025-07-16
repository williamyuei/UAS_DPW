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
        Schema::create('pinjam_detail_anggota', function (Blueprint $table) {
            $table->string('NoPinjam')->primary();
            $table->string('KodeBuku');
            $table->text('Judul');
            $table->text('Penerbit');
            $table->year('TahunTerbit')->nullable();
            $table->integer('Jumlah');


            $table->foreign('NoPinjam')
                ->references('NoPinjam')
                ->on('pinjam_header_anggota')
                ->onDelete('cascade');
            $table->foreign('KodeBuku')
                ->references('KodeBuku')
                ->on('buku')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam__detail__anggota');
    }
};
