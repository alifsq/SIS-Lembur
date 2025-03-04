
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


## Tampilan Menu
1. Login Page
   ![Image](https://github.com/user-attachments/assets/f3f8412c-ef00-4ef7-bd15-bbea2a7ccb43)
2. Dashboard Admin
   ![Image](https://github.com/user-attachments/assets/7dca9ae6-a176-4ba5-8389-e3bd896a9a54)
3. Manajemen Karyawan
   ![Image](https://github.com/user-attachments/assets/1b4001ac-5e07-4d6f-98ec-6fd925abab23)
4. Manajemen Lembur
   ![Image](https://github.com/user-attachments/assets/baef16fe-7617-4031-9182-f87b5e1597bc)
5. Rekapan Laporan
    ![Image](https://github.com/user-attachments/assets/b28feb39-c546-47a0-9db5-b5c624930a4c)
6. Karyawan Dashboard (Role Karyawan)
    ![Image](https://github.com/user-attachments/assets/5163dfcb-f5d6-4e5c-9682-ba6cc74b8007)
7. Ajukan Lembur (Role Karyawan)
    ![Image](https://github.com/user-attachments/assets/a40fc1ae-d62e-4cff-9945-d3906695e97f)
## Tech Stack

**Fullstack:** Laravel, Php, Mysql, Javascript
**Kit Laravel:** Breeze
**Library:** DomPDF



## Authors

- [@AlifSyifaulQulub](https://github.com/alifsq)

