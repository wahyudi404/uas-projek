<?php

class SuratKetMhsModel extends Database 
{

    private $table = 'surat_keterangan_mhs';

    public function getAll()
    {
        $query = "SELECT s.*, f.nama_fakultas, ps.program_studi FROM " . $this->table . " s 
        LEFT JOIN fakultas f ON s.fakultas_id = f.id
        LEFT JOIN program_studies ps ON s.program_studi_id = ps.id
        ";
        $this->query($query);
        return $this->resultAll();
    }

    public function getCount()
    {
        $query = "SELECT COUNT(*) as jmlh FROM " . $this->table;

        $this->query($query);
        return $this->result();
    }

    public function getById($id)
    {
        $query = "SELECT s.*, f.nama_fakultas, ps.program_studi FROM " . $this->table . " s 
        LEFT JOIN fakultas f ON s.fakultas_id = f.id
        LEFT JOIN program_studies ps ON s.program_studi_id = ps.id
        WHERE s.id=:id
        ";
        $this->query($query);
        $this->bind('id', $id);
        return $this->result();
    }

    public function insertSurat($data)
    {
        $email = $data['email'];
        $tahun_sekarang = $data['tahun_sekarang'];
        $nama = $data['nama'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $alamat_desa_kel = $data['alamat_desa_kel'];
        $alamat_kec_kota = $data['alamat_kec_kota'];
        $fakultas_id = $data['fakultas_id'];
        $program_studi_id = $data['program_studi_id'];
        $nim = $data['nim'];
        $tahun_akademik = $data['tahun_akademik'];
        $semester = $data['semester'];
        $nama_ortu = $data['nama_ortu'];
        $nip = $data['nip'];
        $golongan = $data['golongan'];
        $instansi = $data['instansi'];
        $created_at = date('Y-m-d');

        $query = "INSERT INTO " . $this->table . " VALUES 
        ('', :email, :tahun_sekarang, :nama, :tempat_lahir, :tanggal_lahir, :alamat_desa_kel, :alamat_kec_kota, :fakultas_id, :program_studi_id, :nim, :tahun_akademik, :semester, :nama_ortu, :nip, :golongan, :instansi , :created_at)
        ";

        $this->query($query);
        $this->bind('email', $email);
        $this->bind('tahun_sekarang', $tahun_sekarang);
        $this->bind('nama', $nama);
        $this->bind('tempat_lahir', $tempat_lahir);
        $this->bind('tanggal_lahir', $tanggal_lahir);
        $this->bind('alamat_desa_kel', $alamat_desa_kel);
        $this->bind('alamat_kec_kota', $alamat_kec_kota);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('nim', $nim);
        $this->bind('tahun_akademik', $tahun_akademik);
        $this->bind('semester', $semester);
        $this->bind('nama_ortu', $nama_ortu);
        $this->bind('nip', $nip);
        $this->bind('golongan', $golongan);
        $this->bind('instansi', $instansi);
        $this->bind('created_at', $created_at);
        $this->execute();
        return $this->getRowCount();
    }

    public function updateSurat($id, $data)
    {
        $email = $data['email'];
        $tahun_sekarang = $data['tahun_sekarang'];
        $nama = $data['nama'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $alamat_desa_kel = $data['alamat_desa_kel'];
        $alamat_kec_kota = $data['alamat_kec_kota'];
        $fakultas_id = $data['fakultas_id'];
        $program_studi_id = $data['program_studi_id'];
        $nim = $data['nim'];
        $tahun_akademik = $data['tahun_akademik'];
        $semester = $data['semester'];
        $nama_ortu = $data['nama_ortu'];
        $nip = $data['nip'];
        $golongan = $data['golongan'];
        $instansi = $data['instansi'];

        
        $query = "UPDATE " . $this->table . " SET 
        email=:email, tahun_sekarang=:tahun_sekarang, nama=:nama, tempat_lahir=:tempat_lahir, tanggal_lahir=:tanggal_lahir, alamat_desa_kel=:alamat_desa_kel, alamat_kec_kota=:alamat_kec_kota, fakultas_id=:fakultas_id, program_studi_id=:program_studi_id, nim=:nim, tahun_akademik=:tahun_akademik, semester=:semester, nama_ortu=:nama_ortu, nip=:nip, golongan=:golongan, instansi=:instansi WHERE id=:id
        ";

        $this->query($query);
        $this->bind('id', $id);
        $this->bind('email', $email);
        $this->bind('tahun_sekarang', $tahun_sekarang);
        $this->bind('nama', $nama);
        $this->bind('tempat_lahir', $tempat_lahir);
        $this->bind('tanggal_lahir', $tanggal_lahir);
        $this->bind('alamat_desa_kel', $alamat_desa_kel);
        $this->bind('alamat_kec_kota', $alamat_kec_kota);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('nim', $nim);
        $this->bind('tahun_akademik', $tahun_akademik);
        $this->bind('semester', $semester);
        $this->bind('nama_ortu', $nama_ortu);
        $this->bind('nip', $nip);
        $this->bind('golongan', $golongan);
        $this->bind('instansi', $instansi);
        $this->execute();
        return $this->getRowCount();
    }

    public function deleteSurat($id)
    {
        $this->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->bind('id', $id);
        $this->execute();
        return $this->getRowCount();
    }

    public function getBySearching($post)
    {
        $key = $post['key'];
        $query = "SELECT s.*, f.nama_fakultas, ps.program_studi FROM " . $this->table . " s 
        LEFT JOIN fakultas f ON s.fakultas_id = f.id
        LEFT JOIN program_studies ps ON s.program_studi_id = ps.id
        WHERE s.nim LIKE :nim OR s.nama LIKE :nama OR s.nama_ortu LIKE :nama_ortu OR ps.program_studi LIKE :program_studi OR s.tahun_akademik LIKE :tahun_akademik OR s.golongan LIKE :golongan OR s.instansi LIKE :instansi
        ";

        $this->query($query);
        $this->bind('nim', "%$key%");
        $this->bind('nama', "%$key%");
        $this->bind('nama_ortu', "%$key%");
        $this->bind('golongan', "%$key%");
        $this->bind('instansi', "%$key%");
        $this->bind('tahun_akademik', "%$key%");
        $this->bind('program_studi', "%$key%");
        return $this->resultAll();
    }
}