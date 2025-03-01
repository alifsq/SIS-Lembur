<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanLembur;
use Illuminate\Support\Facades\Auth;

class DashboardKaryawanController extends Controller
{
    public function dashboardkaryawan()
    {
        $karyawan_id = Auth::user()->id; 
        $data = PengajuanLembur::where('karyawan_id', $karyawan_id)->with('karyawan')->get();
        $total_data = $data->count();
        $total_approved = PengajuanLembur::where('karyawan_id', $karyawan_id)->where('status', 'approved')->count();
        $total_pending = PengajuanLembur::where('karyawan_id', $karyawan_id)->where('status', 'pending')->count();
        $total_rejected = PengajuanLembur::where('karyawan_id', $karyawan_id)->where('status', 'rejected')->count();
        return view('dashboardkaryawan', [
            'judul' => 'Dashboard karyawan',
            'data' => $data,
            'total_data' => $total_data,
            'total_approved' => $total_approved,
            'total_pending' => $total_pending,
            'total_rejected' => $total_rejected,
            'sidebar' => 'dashboardkaryawan',
        ]);
    }
}
