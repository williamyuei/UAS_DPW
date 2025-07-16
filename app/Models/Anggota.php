<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    public $table = "anggota";
    protected $primaryKey = 'KodeAnggota';
    public $incrementing = false;


    protected $fillable = [
        "KodeAnggota",
        "Nama",
        "TTL",
        "Alamat",
        "KodePos",
        "NoTelp",
        "Hp",
        "TglDaftar",
        "Email",
    ];

    public function pinjamHeaderAnggota()
    {
        return $this->hasMany(Pinjam_Header_Anggota::class, 'KodeAnggota', 'KodeAnggota');
    }
}
