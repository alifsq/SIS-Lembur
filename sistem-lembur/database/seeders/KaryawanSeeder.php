<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\Models\User;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Budi',
                'nip' => '13579',
                'Posisi' => 'pegawai',
                'email' => 'budi@example.com',
                'password' => 'budi123',
            ],
        ];

        $data2 = [
            [
                'id' => 1,
                'name' => 'Budi',
                'email' => 'budi@example.com',
                'password' => 'budi123',
                'role'=>'karyawan',
            ],
        ];

        $data3 = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => 'admin123',
                'role'=>'admin',
            ]
        ];

        // Masukkan data ke dalam database
        foreach ($data as $item) {
            Karyawan::create($item);
        }
        
        foreach ($data2 as $item) {
            User::create($item);
        }

        foreach ($data3 as $item) {
            User::create($item);
        }

    }
}
