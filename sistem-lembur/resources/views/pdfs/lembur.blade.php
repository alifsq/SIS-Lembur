<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perintah Lembur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 2px solid black;
            width: 600px;
        }
        h1 {
            text-align: center;
            text-decoration: underline;
        }
        .content {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            margin-top: 20px;
        }
        .table td {
            padding: 5px;
        }
        .signature {
            display: table;
            margin-top: 50px;
            width: 100%;
        }
        .signature div {
            display: inline-block;
            width: 49%;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>SURAT LAPORAN PERINTAH LEMBUR</h1>

<div class="content">
    <p>Pada hari  {{ $lembur->tanggal_lembur }} bahwasannya yang bertanda tangan di bawah ini, dengan ini menyampaikan laporan perintah lembur yang diberikan kepada:</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>: {{ $lembur->karyawan->nama }}</td>
        </tr>
        <tr>
            <td>Posisi</td>
            <td>: {{ $lembur->karyawan->posisi }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ $lembur->tanggal_lembur }} </td>
        </tr>
        <tr>
            <td>Jam Mulai</td>
            <td>: {{ $lembur->jam_mulai }}</td>
        </tr>
        <tr>
            <td>Jam Selesai</td>
            <td>: {{ $lembur->jam_selesai }}</td>
        </tr>
        <tr>
            <td>Durasi (Jam)</td>
            <td>: {{ $lembur->total_jam_lembur }} Jam</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $lembur->keterangan }}</td>
        </tr>
    </table>

    <div class="signature">
        <div>
            <p>Pelapor</p>
            <br>
            <br>
            <br>
            <p>Admin</p>
        </div>
        <div>
            <p>Manager</p>
            <br>
            <br>
            <br>
            <p>Budi Erwandi</p>
        </div>
    </div>
</div>

</body>
</html>