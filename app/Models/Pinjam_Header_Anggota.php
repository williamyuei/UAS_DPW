<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam_Header_Anggota extends Model
{
    public $table = "pinjam_header_anggota";
    protected $primaryKey = 'NoPinjam';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NoPinjam',
        'TglPinjam',
        'TglKembali',
        'KodeAnggota',
        'KodePetugas',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'TglPinjam' => 'date:Y-m-d',
        'TglKembali' => 'date:Y-m-d',
    ];


    // Custom methods
    public static function generateNoPinjam()
    {
        $latestPinjam = Pinjam_Header_Anggota::orderBy('NoPinjam', 'desc')->first();
        if ($latestPinjam) {
            $lastNumber = intval(substr($latestPinjam->NoPinjam, -4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        return 'PJ-' . $newNumber;
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'KodeAnggota', 'KodeAnggota');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'KodePetugas', 'KodePetugas');
    }

    public function detail()
    {
        return $this->hasMany(Pinjam_Detail_Anggota::class, 'NoPinjam', 'NoPinjam');
    }

    public function kembali()
    {
        return $this->hasMany(Kembali_Anggota::class, 'NoPinjam', 'NoPinjam');
    }

}
