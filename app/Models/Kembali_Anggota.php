<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pinjam_Header_Anggota;
use App\Models\Petugas;

class Kembali_Anggota extends Model
{
    protected $table = 'kembali_anggota';
    protected $primaryKey = 'NoKembali';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'NoKembali', 
        'NoPinjam', 
        'TglKembali', 
        'KodePetugas'
    ];

    protected $dates = ['TglKembali'];

    /**
     * Get the pinjam header associated with the pengembalian.
     */
    public function pinjamHeader()
    {
        return $this->belongsTo(Pinjam_Header_Anggota::class, 'NoPinjam', 'NoPinjam');
    }

    /**
     * Get the petugas (staff) who processed the return.
     */
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'KodePetugas', 'KodePetugas');
    }

    /**
     * Generate the next return number.
     */
    public static function generateNoKembali()
    {
        $lastKembali = static::orderBy('NoKembali', 'desc')->first();
        
        if (!$lastKembali) {
            return 'KB001';
        }
        
        $lastNumber = (int) substr($lastKembali->NoKembali, 2);
        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        
        return 'KB' . $nextNumber;
    }
}
