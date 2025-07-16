<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pinjam_Detail_Anggota extends Model
{
    public $table = "pinjam_detail_anggota";
    protected $primaryKey = 'NoPinjam';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NoPinjam',
        'KodeBuku',
        'Judul',
        'Penerbit',
        'TahunTerbit',
        'Jumlah',
    ];

    public function pinjamHeaderAnggota()
    {
        return $this->belongsTo(Pinjam_Header_Anggota::class, 'NoPinjam', 'NoPinjam');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'KodeBuku', 'KodeBuku');
    }

}
