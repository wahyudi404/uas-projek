<?php

class SuratRekomendasiKampusModel extends Database 
{

    private $table = 'surat_rekomendasi_kampus';

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
        $nama_perekomendasi = $data['nama_perekomendasi'];
        $jabatan = $data['jabatan'];
        $nidn = $data['nidn'];
        $nama_mhs = $data['nama_mhs'];
        $nim = $data['nim'];
        $program_studi_id = $data['program_studi_id'];
        $fakultas_id = $data['fakultas_id'];
        $semester = $data['semester'];
        $ipk = $data['ipk'];
        $untuk_menjadi = $data['untuk_menjadi'];
        $tahun_akademik = $data['tahun_akademik'];
        $created_at = date('Y-m-d');

        $query = "INSERT INTO " . $this->table . " VALUES 
        ('', :email, :tahun_sekarang, :nama_perekomendasi, :jabatan, :nidn, :nama_mhs, :nim, :program_studi_id, :fakultas_id, :semester, :ipk, :untuk_menjadi, :tahun_akademik, :created_at)
        ";

        $this->query($query);
        $this->bind('email', $email);
        $this->bind('tahun_sekarang', $tahun_sekarang);
        $this->bind('nama_perekomendasi', $nama_perekomendasi);
        $this->bind('jabatan', $jabatan);
        $this->bind('nidn', $nidn);
        $this->bind('nama_mhs', $nama_mhs);
        $this->bind('nim', $nim);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('semester', $semester);
        $this->bind('ipk', $ipk);
        $this->bind('untuk_menjadi', $untuk_menjadi);
        $this->bind('tahun_akademik', $tahun_akademik);
        $this->bind('created_at', $created_at);
        $this->execute();
        return $this->getRowCount();
    }

    public function updateSurat($id, $data)
    {
        $email = $data['email'];
        $tahun_sekarang = $data['tahun_sekarang'];
        $nama_perekomendasi = $data['nama_perekomendasi'];
        $jabatan = $data['jabatan'];
        $nidn = $data['nidn'];
        $nama_mhs = $data['nama_mhs'];
        $nim = $data['nim'];
        $program_studi_id = $data['program_studi_id'];
        $fakultas_id = $data['fakultas_id'];
        $semester = $data['semester'];
        $ipk = $data['ipk'];
        $untuk_menjadi = $data['untuk_menjadi'];
        $tahun_akademik = $data['tahun_akademik'];

        
        $query = "UPDATE " . $this->table . " SET 
        email=:email, tahun_sekarang=:tahun_sekarang, nama_perekomendasi=:nama_perekomendasi, jabatan=:jabatan, nidn=:nidn, nama_mhs=:nama_mhs, nim=:nim, program_studi_id=:program_studi_id, fakultas_id=:fakultas_id, semester=:semester, ipk=:ipk, untuk_menjadi=:untuk_menjadi, tahun_akademik=:tahun_akademik WHERE id=:id
        ";

        $this->query($query);
        $this->bind('id', $id);
        $this->bind('email', $email);
        $this->bind('tahun_sekarang', $tahun_sekarang);
        $this->bind('nama_perekomendasi', $nama_perekomendasi);
        $this->bind('jabatan', $jabatan);
        $this->bind('nidn', $nidn);
        $this->bind('nama_mhs', $nama_mhs);
        $this->bind('nim', $nim);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('semester', $semester);
        $this->bind('ipk', $ipk);
        $this->bind('untuk_menjadi', $untuk_menjadi);
        $this->bind('tahun_akademik', $tahun_akademik);
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
        WHERE s.nama_mhs LIKE :nama_mhs OR s.nim LIKE :nim OR s.nama_perekomendasi LIKE :nama_perekomendasi OR s.jabatan LIKE :jabatan OR ps.program_studi LIKE :program_studi OR s.tahun_akademik LIKE :tahun_akademik
        ";

        $this->query($query);
        $this->bind('nama_mhs', "%$key%");
        $this->bind('nim', "%$key%");
        $this->bind('nama_perekomendasi', "%$key%");
        $this->bind('jabatan', "%$key%");
        $this->bind('program_studi', "%$key%");
        $this->bind('tahun_akademik', "%$key%");
        return $this->resultAll();
    }
}