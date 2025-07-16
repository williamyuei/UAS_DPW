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
        Schema::create('buku', function (Blueprint $table) {
            $table->string('KodeBuku')->primary();
            $table->string('NoUDC');
            $table->string('NoReg');
            $table->text('Judul');
            $table->text('Penerbit');
            $table->text('Pengarang');
            $table->year('TahunTerbit');
            $table->string('KotaTerbit');
            $table->string('Bahasa');
            $table->string('Edisi');
            $table->text('Deskripsi');
            $table->string('ISBN');
            $table->integer('JumEksemplar');
            $table->text('SubyekUtama');
            $table->text('SubyekTambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
