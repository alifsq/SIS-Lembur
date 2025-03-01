@extends('layouts.main')

@section('content')
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Total Jam</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->karyawan->nama }}</td>
                    <td>{{ $item->karyawan->nip }}</td>
                    <td>{{ $item->tanggal_lembur }}</td>
                    <td>{{ $item->jam_mulai }}</td>
                    <td>{{ $item->jam_selesai }}</td>
                    <td>{{ $item->total_jam_lembur }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td> 
                        <button><a href="/rekapanlaporan/{{$item->id}}/pdf">Cetak Surat Laporan</a></button>
                    </td>
                        </div>

                        <!--Tombol edit-->
                        <!--Tombol Selesai-->

                        <!--Tombol Selesai-->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection