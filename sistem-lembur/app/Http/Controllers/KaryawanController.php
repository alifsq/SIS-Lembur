<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Karyawan::all();

        return view('karyawan', [
            'judul' => 'Manajemen Karyawan',
            'data' => $data,
            'sidebar' => 'karyawan'
            
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
            'nama' => 'required',
            'nip' => 'required',
            'posisi' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Buat user dan dapatkan ID secara langsung
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'karyawan',
        ]);
        // Dapatkan last insert ID
        $lastInsertId = DB::getPdo()->lastInsertId();

        // Gunakan last insert ID
        Karyawan::create([
            'id' => $lastInsertId,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'posisi' => $request->posisi,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // toast('Registration has been successful','success');
        return redirect()->intended('/karyawan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'posisi' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $karyawans = Karyawan::find($id);
        $karyawans->nama = $validatedData['nama'];
        $karyawans->nip = $validatedData['nip'];
        $karyawans->posisi = $validatedData['posisi'];
        $karyawans->email = $validatedData['email'];
        $karyawans->password = $validatedData['password'];

        $karyawans->save();

        // Ubah data di tabel user
        $user = User::find($karyawans->id);
        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        // toast('Your data has been saved!','success');
        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus karyawan dengan ID yang sama
        Karyawan::where('id', $id)->delete();
        // Hapus user dengan ID yang sama
        User::where('id', $id)->delete();

        return redirect('/karyawan');
    }
}
