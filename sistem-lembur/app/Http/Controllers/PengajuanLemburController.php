<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLembur;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\LaporanLemburan;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PengajuanLemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PengajuanLembur::with('karyawan')->get();
        return view('pengajuanlembur', [
            'judul' => 'Manajemen Lembur',
            'isicombo' => Karyawan::get(),
            'data' => $data,
            'sidebar' => 'pengajuanlembur',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //buat validasi
        $validatedData = $request->validate([
            'karyawan_id' => 'required',
            'tanggal_lembur' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'total_jam_lembur' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);
        //untuk menyimpan data


        // Simpan data pengajuan lembur
        PengajuanLembur::create($validatedData);

        return redirect()->intended('/pengajuanlembur');
    }

    public function selesai(Request $request, $id)
    {
        // Cari data pengajuan lembur berdasarkan ID
        $pengajuanLembur = PengajuanLembur::findOrFail($id);

        // Pindahkan data ke tabel laporan_lemburans
        LaporanLemburan::create([
            'karyawan_id' => $pengajuanLembur->karyawan_id,
            'tanggal_lembur' => $pengajuanLembur->tanggal_lembur,
            'jam_mulai' => $pengajuanLembur->jam_mulai,
            'jam_selesai' => $pengajuanLembur->jam_selesai,
            'total_jam_lembur' => $pengajuanLembur->total_jam_lembur,
            'keterangan' => $pengajuanLembur->keterangan,
        ]);

        // Hapus data dari tabel pengajuan_lemburs
        $pengajuanLembur->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->intended('/pengajuanlembur')->with('success', 'Pengajuan lembur selesai dipindahkan ke laporan lemburan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(PengajuanLembur $pengajuanLembur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanLembur $pengajuanLembur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)

    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required',
            'tanggal_lembur' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'total_jam_lembur' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        $lembur = PengajuanLembur::find($id);
        $lembur->karyawan_id = $validatedData['karyawan_id'];
        $lembur->tanggal_lembur = $validatedData['tanggal_lembur'];
        $lembur->jam_mulai = $validatedData['jam_mulai'];
        $lembur->jam_selesai = $validatedData['jam_selesai'];
        $lembur->total_jam_lembur = $validatedData['total_jam_lembur'];
        $lembur->keterangan = $validatedData['keterangan'];
        $lembur->status = $validatedData['status'];

        $lembur->save();

        // toast('Your data has been saved!','success');
        return redirect('/pengajuanlembur');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus karyawan dengan ID yang sama
        PengajuanLembur::where('id', $id)->delete();
        return redirect('/pengajuanlembur');
    }

    public function pengajuan()
    {
        $karyawan_id = Auth::user()->id;
        $data = PengajuanLembur::where('karyawan_id', $karyawan_id)->with('karyawan')->get();
        return view('pengajuan', [
            'judul' => 'Pengajuan Lembur Karyawan',
            'data' => $data,
            'sidebar' => 'pengajuanlembur',
        ]);
    }

    public function simpanPengajuan(Request $request)
    {
        // Buat validasi
        $validatedData = $request->validate([
            'tanggal_lembur' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'total_jam_lembur' => 'required',
            'keterangan' => 'required',
        ]);

        $validatedData['karyawan_id'] = Auth::user()->id;
        $validatedData['status'] = 'pending';

        try {
            // Simpan data pengajuan lembur
            PengajuanLembur::create($validatedData);

            // Set pesan sukses
            return redirect()->intended('/pengajuan')->with('success', 'Pengajuan lembur berhasil disimpan.');
        } catch (\Exception $e) {
            // Set pesan gagal
            return redirect()->intended('/pengajuan')->with('error', 'Pengajuan lembur gagal disimpan: ' . $e->getMessage());
        }
    }

    public function generatePDF($id)
    {
        // Retrieve the lembur data from the database
        $pengajuan = PengajuanLembur::with('karyawan')->findOrFail($id);

        // Format the date to the desired format
        $date = new DateTime($pengajuan->tanggal_lembur);
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

        // Ubah hari dalam tanggal dengan sesuai di database PengajuanLembur
        $hari_ini = $hari[$date->format('l')];

        // Ubah tanggal dengan format yang diinginkan
        $tanggal_ini = $date->format('d');
        $tahun_ini = $date->format('Y');
        $bulan_ini = $bulan[$date->format('F')];

        // Gabungkan tanggal dengan format yang diinginkan
        $formatted_date = $hari_ini . ', ' . $tanggal_ini . ' ' . $bulan_ini . ' ' . $tahun_ini;

        // Ubah tanggal dalam pengajuan dengan tanggal yang telah diformat
        $pengajuan['tanggal_lembur'] = $formatted_date;

        $pdf = PDF::loadView('pdfs.pengajuan', ['pengajuan' => $pengajuan]);

        // Download the PDF file
        return $pdf->download('pengajuan_' . $pengajuan->id . '.pdf');
    }
}
