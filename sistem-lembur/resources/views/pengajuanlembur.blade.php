@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-default bg-green sm-right mr-3 mb-3 mt-3" data-toggle="modal"
            data-target="#modal-add-lemburan">Tambah Pengajuan</button>
    </div>
    <div class="modal fade" id="modal-add-lemburan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengajuan Lemburan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/pengajuanlembur">
                        @csrf
                        <div class="card-body">
                            <!--select Project-->
                            <div class="form-group">
                                <label>Nama</label>
                                <select class="form-control select2bs4" style="width: 100%" name="karyawan_id">
                                    @foreach ($isicombo as $a)
                                        <option value="{{ $a->id }}"> {{ $a->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lembur</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input id="tanggal_lembur" type="date" class="form-control " name="tanggal_lembur" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type="time" name="jam_mulai" id="jam_mulai"
                                    class="form-control @error('jam_mulai') is-invalid @enderror"
                                    value="{{ old('jam_mulai') }}">
                                @error('jam_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" name="jam_selesai" id="jam_selesai"
                                    class="form-control @error('jam_selesai') is-invalid @enderror"
                                    value="{{ old('jam_selesai') }}">
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

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="status_lemburan"
                                    name="status">
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approve
                                    </option>
                                    <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Lembur</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Nip</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Jam Mulai</th>
                        <th style="text-align: center;">Jam Selesai</th>
                        <th style="text-align: center;">Total Jam</th>
                        <th style="text-align: center;">Keterangan</th>
                        <th style="text-align: center;">Status Pengajuan</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                    
                </thead>
                <tbody>

                    @foreach ($data as $key => $item)
                        <tr>
                            <td data-id="id">{{ $key + 1 }}</td>
                            <td data-id="nama">{{ $item->karyawan->nama }}</td>
                            <td data-id="nip">{{ $item->karyawan->nip }}</td>
                            <td data-id="tanggal_lembur">{{ $item->tanggal_lembur }}</td>
                            <td data-id="jam_mulai">{{ $item->jam_mulai }}</td>
                            <td data-id="jam_selesai">{{ $item->jam_selesai }}</td>
                            <td data-id="total_jam_lembur">{{ $item->total_jam_lembur }}</td>
                            <td data-id="keterangan">{{ $item->keterangan }}</td>
                            <td>
                                <span
                                    class="badge 
                                {{ $item->status == 'pending' ? 'bg-warning' : '' }}
                                {{ $item->status == 'approved' ? 'bg-success' : '' }}
                                {{ $item->status == 'rejected' ? 'bg-danger' : '' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            <td>
                                <div class="d-flex justify-content-end align-items-center flex-wrap">
                                    <!-- Tombol Edit, Delete, Selesai, dan Cetak Surat -->
                                    <div class="btn-group mr-4 mb-2">
                                        <button type="button" id="btn-edit-pengajuan"
                                            class="btn btn-default bg-yellow mr-2" data-toggle="modal"
                                            data-target="#modal-edit-pengajuan" data-id="{{ $item->id }}"
                                            data-nama="{{  $item->karyawan->nama }}" data-tanggal_lembur="{{ $item->tanggal_lembur }}"
                                            data-jam_mulai="{{ $item->jam_mulai }}"
                                            data-jam_selesai="{{ $item->jam_selesai }}"
                                            data-total_jam_lembur="{{ $item->total_jam_lembur }}"
                                            data-keterangan="{{ $item->keterangan }}" data-status="{{ $item->status }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="/pengajuanlembur/{{ $item->id }}" method="post"
                                            class="d-inline-block mr-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="btn-delete-project" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('pengajuanlembur.selesai', $item->id) }}" method="post"
                                            class="d-inline-block mr-2">
                                            @csrf
                                            <button type="submit" id="btn-selesai-lembur" class="btn btn-success">
                                                <i class="fas fa-check"></i> Selesai
                                            </button>
                                        </form>
                                        <button class="btn btn-primary mr-2">
                                            <a href={{ route('pengajuan.lemburanpdf',$item->id) }} class="text-white">Cetak Surat</a>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="modal fade" id="modal-edit-pengajuan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Lemburan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formEdit">
                            @csrf
                            <div class="card-body">
                              <!-- Select Project -->
                                <div class="form-group">
                                    <label>Nama</label>
                                    <select class="form-control select2bs4" style="width: 100%" id="edit_nama" name="karyawan_id">
                                        @foreach ($isicombo as $a)
                                            <option value="{{ $a->id }}" data-nama="{{ $a->nama }}">{{ $a->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lembur</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input id="edit_tanggal_lembur" type="date" class="form-control "
                                            name="tanggal_lembur" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" id="edit_jam_mulai"
                                        class="form-control @error('jam_mulai') is-invalid @enderror"
                                        value="{{ old('jam_mulai') }}">
                                    @error('jam_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <input type="time" name="jam_selesai" id="edit_jam_selesai"
                                        class="form-control @error('jam_selesai') is-invalid @enderror"
                                        value="{{ old('jam_selesai') }}">
                                    @error('jam_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="total_jam_lembur">Total Jam Lembur</label>
                                    <input type="number" name="total_jam_lembur" id="edit_total_jam_lembur"
                                        class="form-control @error('total_jam_lembur') is-invalid @enderror"
                                        value="{{ old('total_jam_lembur') }}" step="0.01">
                                    @error('total_jam_lembur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="edit_keterangan" rows="4"
                                        class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="status_lemburan"
                                        name="status">
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>
                                            Approve
                                        </option>
                                        <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>
                                            Rejected
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
@endsection
