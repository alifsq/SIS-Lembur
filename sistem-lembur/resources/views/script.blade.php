<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#btn-edit-karyawan', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var nip = $(this).data('nip');
            var posisi = $(this).data('posisi');
            var email = $(this).data('email');
            var password = $(this).data('password');
            console.log(password)
           // $('#modal-edit-karyawan').modal('show');
            $('#id').val(id);
            $('#nama_karyawan-edit').val(nama);
            $('#nip_karyawan-edit').val(nip);
            $('#posisi_karyawan-edit').val(posisi);
            $('#email_karyawan-edit').val(email);
            $('#password_karyawan-edit').val(password);
            $('#formEdit').attr("action", "/karyawan/update/" + id);
        });
        $(document).on('click', '#btn-edit-pengajuan', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama'); // Get the name from the button
            var tanggal_lembur = $(this).data('tanggal_lembur');
            var jam_mulai = $(this).data('jam_mulai');
            var jam_selesai = $(this).data('jam_selesai');
            var total_jam_lembur = $(this).data('total_jam_lembur');
            var keterangan = $(this).data('keterangan');
            var status = $(this).data('status');

            $('#edit_nama').val(id).trigger('change');
            $('#edit_nama option').each(function() {
                if ($(this).data('nama') === nama) {
                    $(this).prop('selected', true); 
                }
            });

            $('#id').val(id);
            $('#edit_tanggal_lembur').val(tanggal_lembur);
            $('#edit_jam_mulai').val(jam_mulai);
            $('#edit_jam_selesai').val(jam_selesai);
            $('#edit_total_jam_lembur').val(total_jam_lembur);
            $('#edit_keterangan').val(keterangan);
            $('#status_lemburan').val(id).trigger('change');
            console.log(status)
            $('#status_lemburan option').each(function() {
                if ($(this).data('status') === status) {
                    $(this).prop('selected', true); 
                }
            });
            $('#formEdit').attr("action", "pengajuanlembur/" + id + "?_method=PUT");
        });

    });
</script>
