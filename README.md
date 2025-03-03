
# Sistem Lembur Karyawan(Sis-Lembur)

Sistem ini digunakan untuk manajemen karyawan dalam melakukan lembur mulai dari persetujuan dan pelaporan.

Penjelasan Fitur Admin

-> Menu Dashboard Menampilkan informasi banyaknya Jumlah Karyawan , Jumlah Pengajuan , Total Data Approved atau yang disetujui , Total Data Pending , Total Data Rejected, Total Lemburan Selesai,

-> Menu Manajemen Karyawan -> Menambahkan Data Karyawan, Menampilkan Data Karyawan ,Mengedit Data Karyawan, Menghapus Data Karyawan,  Search , export csv, excel, pdf ,print -> Email dan Password berfungsi untuk login karyawan 

-> Menu Manajemen Lembur -> Menambahkan Data Lemburan, Menampilkan Data Lemburan, Menghapus Data Lemburan, Mengedit Data Lemburan,   Search , export csv, excel, pdf, -> Pengubahan Persetujuan Status Permohonan Lemburan Karyawan Yang masuk dengan default nilai pending sebelum di setujui dan tidak disetujui oleh admin, -> Tombol Selesai Digunakan apabila lemburan tersebut selesai dan data akan masuk ke laporan rekap lemburan , -> Cetak Surat Digunakan untuk mencetak surat permohonan lemburan 

-> Menu Rekapan Laporan Digunakan untuk melihat data Lemburan Yang sudah selesai -> tombol cetak laporan digunakn untuk mencetak surat laporan lemburan apabila di perlukan oleh admin



-> Penjelasan Fitur Karyawan

-> Menu Dashboard Karyawan -> Melihat Total Data Approved atau di setujui ,Total Data Pending, Total Data Rejected yang sesuai dengan karyawan yang login saja tanpa data lainnya.

-> Menu Ajukan Lembur -> Menambahkan Pengajuan Lembur Ke admin , Melihat Data Pengajuan dirinya apakah sudah di approved atau di setujui, atau rejected yang artinya di tolak -> Cetak surat persetujuan dalam format pdf apabila perlu di cetak oleh karyawan -> data otomatis akan hilang pada menu karyawan apabila admin sudah mengkonfirmasi selesai lemburan yang di lakukan.



## Installasi Aplikasi

Clone Git Repo
```bash
  git clone https://github.com/alifsq/SIS-Lembur.git
```
install vendor yang diperlukan 
```bash
  composer install
```
generate key laravel 
```bash
  php artisan key:generate
```
buat file .env dan Copy semua .env.example

buat database ,kemudian konfigurasi connection database di .env: 
```bash
  DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=lemburdb
	DB_USERNAME=root
	DB_PASSWORD=

	DB_COLLATION=utf8mb4_unicode_ci -> sesuaikan versi mysql
```
migrate database 
```bash
  php artisan migrate
```
lakukan seeder database 
```bash
  php artisan db:seed
```
running laravel
```bash
  php artisan serve
```
login dengan role admin 
```bash
  email : admin@example.com
  password : admin123
```
untuk login di role menu karyawan ,harap mengisikan data karyawan terlebih dahulu di menu manajemen karyawan , gunakan email dan password yang sama dengan yang di isikan.



## Tech Stack

**Fullstack:** Laravel, Php, Mysql, Javascript

**Library:** DomPDF



## Authors

- [@AlifSyifaulQulub](https://github.com/alifsq)

