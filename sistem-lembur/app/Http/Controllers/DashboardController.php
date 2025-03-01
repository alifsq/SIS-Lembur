<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\LaporanLemburan;
use App\Models\PengajuanLembur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        
        $datakaryawan = Karyawan::all();
        $jumlahDataKaryawan = count($datakaryawan);

        $datapengajuan = PengajuanLembur::all();
        $jumlahDataPengajuan = count($datapengajuan);

        $total_approved = PengajuanLembur::where('status', 'approved')->count();
        $total_pending = PengajuanLembur::where('status', 'pending')->count();
        $total_rejected = PengajuanLembur::where('status', 'rejected')->count();
        
        $datalaporan = LaporanLemburan::all();
        $jumlahDataLaporan = count($datalaporan);

        return view('dashboard', [
            'judul' => 'Dashboard',
            'data' => $datakaryawan,
            'sidebar'=> 'dashboard',
            'jumlahDataKaryawan' => $jumlahDataKaryawan,
            'jumlahDataPengajuan' => $jumlahDataPengajuan,
            'total_approved' => $total_approved,
            'total_pending' => $total_pending,
            'total_rejected' => $total_rejected,
            'jumlahDataLaporan' =>  $jumlahDataLaporan,

        ]);
    }
}
