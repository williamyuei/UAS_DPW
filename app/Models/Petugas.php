<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "petugas";
    protected $primaryKey = "KodePetugas";

    protected $fillable = [
        'KodePetugas',
        'Nama',
        'Jabatan',
        'HakAkses',
        'password'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = ['password']; // menyembunyikan password dari array/JSON

    public function getAuthIdentifierName()
    {
        return 'KodePetugas';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function pinjamHeaderAnggota()
    {
        return $this->hasMany(Pinjam_Header_Anggota::class, 'KodePetugas', 'KodePetugas');
    }

    public function kembaliAnggota()
    {
        return $this->hasMany(Kembali_Anggota::class, 'KodePetugas', 'KodePetugas');
    }
}
