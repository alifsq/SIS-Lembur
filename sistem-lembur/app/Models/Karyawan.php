<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    
    protected $fillable = [
        'id',
        'nama',
        'nip',
        'posisi',
        'email',
        'password',
    ];

    use HasFactory;

    public function pengajuanLemburs()
    {
        return $this->hasMany(PengajuanLembur::class, 'karyawan_id');
    }
    public function laporanLemburans()
    {
        return $this->hasMany(LaporanLemburan::class, 'karyawan_id');
    }
    
    // public function pengajuanLembur()
    // {
    //     return $this->hasMany(PengajuanLembur::class, 'id_karyawan', 'id_karyawan');
    // }
}
