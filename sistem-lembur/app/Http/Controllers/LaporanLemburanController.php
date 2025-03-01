<?php

namespace App\Http\Controllers;

use App\Models\LaporanLemburan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use DateTime;

class LaporanLemburanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LaporanLemburan::with('karyawan')->get();
        return view('rekapanlaporan', [
            'judul' => 'rekapanlaporan',
            'data' => $data,
            'sidebar'=> 'rekapan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanLemburan $laporanLemburan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanLemburan $laporanLemburan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanLemburan $laporanLemburan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanLemburan $laporanLemburan)
    {
        //
    }

    public function generatePDF($id)
    {
        // Retrieve the lembur data from the database
        $lembur = LaporanLemburan::with('karyawan')->findOrFail($id);

        // Format the date to the desired format
        $date = new DateTime($lembur->tanggal_lembur);
        $hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );
        $bulan = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );
        $hari_ini = $hari[$date->format('l')];
        $bulan_ini = $bulan[$date->format('F')];
        $tanggal_ini = $date->format('d');
        $tahun_ini = $date->format('Y');
        $formatted_date = $hari_ini . ', ' . $tanggal_ini . ' ' . $bulan_ini . ' ' . $tahun_ini;
       

        $lembur['tanggal_lembur'] = $formatted_date;

        $pdf = PDF::loadView('pdfs.lembur', ['lembur' => $lembur]);

        // Download the PDF file
        return $pdf->download('lembur_' . $lembur->id . '.pdf');
    }
}
