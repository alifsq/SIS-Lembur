<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanLemburan extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'tanggal_lembur',
        'jam_mulai',
        'jam_selesai',
        'total_jam_lembur',
        'keterangan',
    ];
    // Relasi ke model Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
    
}
