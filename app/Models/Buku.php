<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    public $table = "buku";
    protected $primaryKey = 'KodeBuku';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'KodeBuku',
        'NoUDC',
        'NoReg',
        'Judul',
        'Penerbit',
        'Pengarang',
        'TahunTerbit',
        'KotaTerbit',
        'Bahasa',
        'Edisi',
        'Deskripsi',
        'ISBN',
        'JumEksemplar',
        'SubyekUtama',
        'SubyekTambahan',
    ];

    public function pinjamDetailAnggota()
    {
        return $this->hasMany(Pinjam_Detail_Anggota::class, 'KodeBuku', 'KodeBuku');
    }

}
