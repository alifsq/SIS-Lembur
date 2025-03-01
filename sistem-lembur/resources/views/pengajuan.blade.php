@extends('layouts.main')

@section('content')
    <h2 class="mt-2 ml-3">Pengajuan Permohonan Lembur</h2>
    <form method="POST" action="{{ route('pengajuan.simpan') }}">
        @csrf
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group">
                <label>Tanggal Lembur</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input id="tanggal_lembur" type="date" class="form-control " name="tanggal_lembur" />
                </div>
            </div>
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai"
                    class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}">
                @error('jam_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai"
                    class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}">
                @error('jam_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="total_jam_lembur">Total Jam Lembur</label>
                <input type="number" name="total_jam_lembur" id="total_jam_lembur"
                    class="form-control @error('total_jam_lembur') is-invalid @enderror"
                    value="{{ old('total_jam_lembur') }}" step="0.01">
                @error('total_jam_lembur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="4"
                    class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Total Jam</th>
                    <th>Keterangan</th>
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pengajuan)
                    <tr>
                        <td>{{ $pengajuan->karyawan->nama }}</td>
                        <td>{{ $pengajuan->karyawan->nip }}</td>
                        <td>{{ $pengajuan->tanggal_lembur }}</td>
                        <td>{{ $pengajuan->jam_mulai }}</td>
                        <td>{{ $pengajuan->jam_selesai }}</td>
                        <td>{{ $pengajuan->total_jam_lembur }}</td>
                        <td>{{ $pengajuan->keterangan }}</td>
                        <td>
                            <span
                                class="badge 
                                {{ $pengajuan->status == 'pending' ? 'bg-warning' : '' }}
                                {{ $pengajuan->status == 'approved' ? 'bg-success' : '' }}
                                {{ $pengajuan->status == 'rejected' ? 'bg-danger' : '' }}">
                                {{ ucfirst($pengajuan->status) }}
                            </span>
                        </td>
                        <td>
                            <button><a href="/pengajuan/{{$pengajuan->id}}/pdf">Cetak Surat Laporan</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
