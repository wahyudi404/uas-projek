$(function () {
    // fakultas modal
    $('.btn-add-fakultas').on('click', function () {
        const baseurl = $(this).data('baseurl');

        $('#fakultasModalLabel').html('Tambah Fakultas');
        $('.modal-content form').attr('action', baseurl + 'fakultas/store');
        $('#nama_fakultas').val('');
    });

    $('.btn-edit-fakultas').on('click', function () {
        const id = $(this).data('id');
        const nama_fakultas = $(this).data('namafakultas');
        const baseurl = $(this).data('baseurl');

        $('#fakultasModalLabel').html('Edit Fakultas');
        $('.modal-content form').attr('action', baseurl + 'fakultas/update/' + id);
        $('#nama_fakultas').val(nama_fakultas);
    });

    // program studi modal
    $('.btn-add-program-studi').on('click', function () {
        const baseurl = $(this).data('baseurl');

        $('.modal-content form').attr('action', baseurl + 'program-studi/store');
        $('#programStudiModalLabel').html('Tambah Program Studi');
        $('#program_studi').val('');
        $('#fakultas_id').val('');
    });

    $('.btn-edit-program-studi').on('click', function () {
        const id = $(this).data('id');
        const program_studi = $(this).data('programstudi');
        const fakultas_id = $(this).data('fakultasid');
        const baseurl = $(this).data('baseurl');

        $('.modal-content form').attr('action', baseurl + 'program-studi/update/' + id);
        $('#programStudiModalLabel').html('Edit Program Studi');
        $('#program_studi').val(program_studi);
        $('#fakultas_id').val(fakultas_id);
    });

    // Surat Modal
    $('.btn-add-surat').on('click', function () {
        const baseurl = $(this).data('baseurl');
        const page = $(this).data('page');
        const date = new Date();

        switch (true) {
            case page == 'surat-ijin-penelitian':
                $('#suratModalLabel').html('Tambah Surat Ijin Penelitian');
                $('.modal-body form').attr('action', baseurl + page + '/store');
                $('#email').val('');
                $('#nama').val('');
                $('#nim').val('');
                $('#tempat_lahir').val('');
                $('#tanggal_lahir').val('');
                $('#tempat_penelitian').val('');
                $('#tahun').val(date.getFullYear());
                $('#fakultas_id').val('');
                $('#program_studi_id').html('');
                $('#program_studi_id').attr('disabled', true);
                $('#yth_kpd').val('');
                $('#judul').val('');
                break;
            case page == 'surat-ket-mhs-aktif':
                $('#suratModalLabel').html('Tambah Surat Keterangan Mahasiswa Aktif (Umum)');
                $('.modal-body form').attr('action', baseurl + page + '/store');
                $('#email').val('');
                $('#tahun_sekarang').val(date.getFullYear());
                $('#nama').val('');
                $('#tempat_lahir').val('');
                $('#tanggal_lahir').val('');
                $('#alamat_desa_kel').val('');
                $('#alamat_kec_kota').val('');
                $('#fakultas_id').val('');
                $('#program_studi_id').html('');
                $('#program_studi_id').attr('disabled', true);
                $('#nim').val('');
                $('#tahun_akademik').val('');
                $('#semester').val('');
                $('#kegunaan').val('');
                break;
            case page == 'surat-ket-mhs':
                $('#suratModalLabel').html('Tambah Surat Keterangan Mahasiswa (Tunjangan)');
                $('.modal-body form').attr('action', baseurl + page + '/store');
                $('#email').val('');
                $('#tahun_sekarang').val(date.getFullYear());
                $('#nama').val('');
                $('#tempat_lahir').val('');
                $('#tanggal_lahir').val('');
                $('#alamat_desa_kel').val('');
                $('#alamat_kec_kota').val('');
                $('#fakultas_id').val('');
                $('#program_studi_id').html('');
                $('#program_studi_id').attr('disabled', true);
                $('#nim').val('');
                $('#tahun_akademik').val('');
                $('#semester').val('');
                $('#nama_ortu').val('');
                $('#nip').val('');
                $('#golongan').val('');
                $('#instansi').val('');
                break;
            case page == 'surat-rekomendasi-kampus':
                $('#suratModalLabel').html('Tambah Surat Rekomendasi Kampus');
                $('.modal-body form').attr('action', baseurl + page + '/store');
                $('#email').val('');
                $('#tahun_sekarang').val(date.getFullYear());
                $('#nama_perekomendasi').val('')
                $('#jabatan').val('')
                $('#nidn').val('')
                $('#nama_mhs').val('')
                $('#nim').val('')
                $('#fakultas_id').val('');
                $('#program_studi_id').html('');
                $('#program_studi_id').attr('disabled', true);
                $('#semester').val('');
                $('#ipk').val('');
                $('#untuk_menjadi').val('');
                $('#tahun_akademik').val('');
                break;
            case page == 'surat-umum':
                $('#suratModalLabel').html('Tambah Surat Umum');
                $('.modal-body form').attr('action', baseurl + page + '/store');
                $('#email').val('');
                $('#tahun_sekarang').val(date.getFullYear());
                $('#perihal').val('');
                $('#penerima').val('');
                $('#kota_tujuan').val('');
                $('#mengadakan_untuk').val('');
                $('#matkul').val('');
                $('#dosen_pembimbing').val('');
                $('#tujuan_instansi').val('');
                $('#nama_mhs').val('');
                $('#nim').val('');
                $('#fakultas_id').val('');
                $('#program_studi_id').html('');
                $('#program_studi_id').attr('disabled', true);
                break;
            case page == 'surat-khusus':
                $('#suratModalLabel').html('Tambah Surat Khusus');
                $('.modal-body form').attr('action', baseurl + page + '/store');
                $('#email').val('');
                $('#nama').val('');
                $('#nim').val('');
                $('#upload').attr('required', true);
                $('#fileHelpId').addClass('d-none');
                $('#keterangan').val('');
                break;

            default:
                $('#penggunaModalLabel').html('Tambah Pengguna');
                $('.modal-body form').attr('action', baseurl + page + '/store');
                $('#name').val('');
                $('#username').val('');
                $('#password').val('');
                $('#password').attr('required', true);
                $('#passwordHelpId').addClass('d-none');
                break;
        }
    });

    $('.btn-edit-surat').on('click', function () {
        const baseurl = $(this).data('baseurl');
        const page = $(this).data('page');
        const json = $(this).data('json');
        const url = baseurl + page + '/update/' + json.id;

        switch (true) {
            case page == 'surat-ijin-penelitian':
                $('#suratModalLabel').html('Edit Surat Ijin Penelitian');
                $('.modal-body form').attr('action', url);
                $('#email').val(json.email);
                $('#nama').val(json.nama);
                $('#nim').val(json.nim);
                $('#tempat_lahir').val(json.tempat_lahir);
                $('#tanggal_lahir').val(json.tanggal_lahir);
                $('#tempat_penelitian').val(json.tempat_penelitian);
                $('#tahun').val(json.tahun);
                $('#fakultas_id').val(json.fakultas_id);
                getFilterProgramStudi(baseurl, page, json.fakultas_id, json.program_studi_id);
                $('#yth_kpd').val(json.yth_kpd);
                $('#judul').val(json.judul);
                break;
            case page == 'surat-ket-mhs-aktif':
                $('#suratModalLabel').html('Edit Surat Keterangan Mahasiswa Aktif (Umum)');
                $('.modal-body form').attr('action', url);
                $('#email').val(json.email);
                $('#tahun_sekarang').val(json.tahun_sekarang);
                $('#nama').val(json.nama);
                $('#tempat_lahir').val(json.tempat_lahir);
                $('#tanggal_lahir').val(json.tanggal_lahir);
                $('#alamat_desa_kel').val(json.alamat_desa_kel);
                $('#alamat_kec_kota').val(json.alamat_kec_kota);
                $('#fakultas_id').val(json.fakultas_id);
                $('#program_studi_id').html('');
                getFilterProgramStudi(baseurl, page, json.fakultas_id, json.program_studi_id);
                $('#nim').val(json.nim);
                $('#tahun_akademik').val(json.tahun_akademik);
                $('#semester').val(json.semester);
                $('#kegunaan').val(json.kegunaan);
                break;
            case page == 'surat-ket-mhs':
                $('#suratModalLabel').html('Edit Surat Keterangan Mahasiswa (Tunjangan)');
                $('.modal-body form').attr('action', url);
                $('#email').val(json.email);
                $('#tahun_sekarang').val(json.tahun_sekarang);
                $('#nama').val(json.nama);
                $('#tempat_lahir').val(json.tempat_lahir);
                $('#tanggal_lahir').val(json.tanggal_lahir);
                $('#alamat_desa_kel').val(json.alamat_desa_kel);
                $('#alamat_kec_kota').val(json.alamat_kec_kota);
                $('#fakultas_id').val(json.fakultas_id);
                $('#program_studi_id').html('');
                getFilterProgramStudi(baseurl, page, json.fakultas_id, json.program_studi_id);
                $('#nim').val(json.nim);
                $('#tahun_akademik').val(json.tahun_akademik);
                $('#semester').val(json.semester);
                $('#nama_ortu').val(json.nama_ortu);
                $('#nip').val(json.nip);
                $('#golongan').val(json.golongan);
                $('#instansi').val(json.instansi);
                break;
            case page == 'surat-rekomendasi-kampus':
                $('#suratModalLabel').html('Edit Surat Rekomendasi Kampus');
                $('.modal-body form').attr('action', url);
                $('#email').val(json.email);
                $('#tahun_sekarang').val(json.tahun_sekarang);
                $('#nama_perekomendasi').val(json.nama_perekomendasi)
                $('#jabatan').val(json.jabatan)
                $('#nidn').val(json.nidn)
                $('#nama_mhs').val(json.nama_mhs)
                $('#nim').val(json.nim)
                $('#fakultas_id').val(json.fakultas_id);
                $('#program_studi_id').html('');
                getFilterProgramStudi(baseurl, page, json.fakultas_id, json.program_studi_id);
                $('#semester').val(json.semester);
                $('#ipk').val(json.ipk);
                $('#untuk_menjadi').val(json.untuk_menjadi);
                $('#tahun_akademik').val(json.tahun_akademik);
                break;
            case page == 'surat-umum':
                $('#suratModalLabel').html('Edit Surat Umum');
                $('.modal-body form').attr('action', url);
                $('#email').val(json.email);
                $('#tahun_sekarang').val(json.tahun_sekarang);
                $('#perihal').val(json.perihal);
                $('#penerima').val(json.penerima);
                $('#kota_tujuan').val(json.kota_tujuan);
                $('#mengadakan_untuk').val(json.mengadakan_untuk);
                $('#matkul').val(json.matkul);
                $('#dosen_pembimbing').val(json.dosen_pembimbing);
                $('#tujuan_instansi').val(json.tujuan_instansi);
                $('#nama_mhs').val(json.nama_mhs);
                $('#nim').val(json.nim);
                $('#fakultas_id').val(json.fakultas_id);
                $('#program_studi_id').html('');
                getFilterProgramStudi(baseurl, page, json.fakultas_id, json.program_studi_id);
                break;
            case page == 'surat-khusus':
                $('#suratModalLabel').html('Edit Surat Khusus');
                $('.modal-body form').attr('action', url);
                $('#email').val(json.email);
                $('#nama').val(json.nama);
                $('#nim').val(json.nim);
                $('#upload').removeAttr('required');
                $('#fileHelpId').removeClass('d-none');
                $('#keterangan').val(json.keterangan);
                break;

            default:
                $('#penggunaModalLabel').html('Edit Pengguna');
                $('.modal-body form').attr('action', url);
                $('#name').val(json.name);
                $('#username').val(json.username);
                $('#password').val('');
                $('#password').removeAttr('required');
                $('#passwordHelpId').removeClass('d-none');

                break;
        }
    });

    // form program_studi_id
    $('#fakultas_id').on('change', function () {
        const baseurl = $(this).data('baseurl');
        const fakultas_id = $(this).val();
        const page = $(this).data('page')

        getFilterProgramStudi(baseurl, page, fakultas_id);
    });

    function getFilterProgramStudi(baseurl, page, fakultas_id, selected = null) {
        $.ajax({
            url: baseurl + page + '/filter_program_studi/' + fakultas_id,
            method: 'GET',
            dataType: 'JSON',
            success: function (response) {
                $('#program_studi_id').html('');
                let option_element = '<option value="" selected disabled>--Pilih Program Studi--</option>';

                response.forEach(element => {
                    option_element += `<option value="${element.id}" ${(selected == element.id) ? 'selected' : ''}>${element.program_studi}</option>`
                });

                $('#program_studi_id').append(option_element)
                $('#program_studi_id').removeAttr('disabled')
            }
        });
    }
});

