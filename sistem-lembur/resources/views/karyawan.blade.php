@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-end mb-2 ">
        <button type="button" class="btn btn-default bg-green sm-right mr-3 mb-3 mt-3" data-toggle="modal"
            data-target="#modal-add">Tambah Karyawan</button>
    </div>

    <!-- Modal Add Data -->
    <!-- /.modal Add Data-->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/karyawan">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputNama">Nama</label>
                                <input type="text" class="form-control" id="InputNama" placeholder="Nama "
                                    name="nama">
                            </div>
                            <div class="form-group">
                                <label for="InputNip">Nip</label>
                                <input type="text" class="form-control" id="InputNip" placeholder="Nip" name="nip">
                            </div>
                            <div class="form-group">
                                <label for="InputPosisi">Posisi</label>
                                <input type="text" class="form-control" id="InputPosisi" placeholder="Posisi"
                                    name="posisi">
                            </div>
                            <div class="form-group">
                                <label for="InputEmail">Email</label>
                                <input type="text" class="form-control" id="InputEmail" placeholder="email"
                                    name="email">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Password</label>
                                <input type="password" class="form-control" id="InputPosisi" placeholder="Password"
                                    name="password">
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Karyawan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Posisi</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td data-id="id">{{ $key + 1 }}</td>
                            <td data-id="nama">{{ $item->nama }}</td>
                            <td data-id="nip">{{ $item->nip }}</td>
                            <td data-id="posisi">{{ $item->posisi }}</td>
                            <td data-id="email">{{ $item->email }}</td>
                            <td data-id="password">{{ $item->password }}</td>
                            <td>
                                <div class="float-lg-right">
                                    <div class="btn-group">
                                        <button type="button" id="btn-edit-karyawan"
                                            class="btn btn-default bg-yellow sm-right mr-3 mb-3" data-toggle="modal"
                                            data-target="#modal-edit-karyawan" data-id="{{ $item->id }}"
                                            data-nama="{{ $item->nama }}" data-nip="{{ $item->nip }}"
                                            data-posisi="{{ $item->posisi }}" data-email="{{ $item->email }}"  data-password="{{ $item->password }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="/karyawan/{{ $item->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="btn-delete-project"
                                                class="btn btn-default bg-red sm-right mr-3 mb-3">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- Modal -->
    <!-- Modal Edit Data -->
    <!-- /.modal Edit Data-->
    <div class="modal fade" id="modal-edit-karyawan" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" id="formEdit">
                        @csrf
                        {{-- @method("PUT") --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="InputNama">Nama</label>
                                <input type="text" class="form-control" id="nama_karyawan-edit" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="InputNip">Nip</label>
                                <input type="text" class="form-control" id="nip_karyawan-edit" name="nip">
                            </div>
                            <div class="form-group">
                                <label for="InputPosisi">Posisi</label>
                                <input type="text" class="form-control" id="posisi_karyawan-edit" name="posisi">
                            </div>
                            <div class="form-group">
                                <label for="InputEmail">Email</label>
                                <input type="text" class="form-control" id="email_karyawan-edit" name="email">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Password</label>
                                <input type="text" class="form-control" id="password_karyawan-edit" name="password">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- /.modal-content -->
        </div>

        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Edit Data-->
@endsection
