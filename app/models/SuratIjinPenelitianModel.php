<?php

class SuratIjinPenelitianModel extends Database 
{

    private $table = 'surat_ijin_penelitian';

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

    public function getCountAllData()
    {
        $query = "SELECT COUNT(*) as count FROM " . $this->table;
        $this->query($query);
        return $this->result();
    }

    public function insertSurat($data)
    {
        $fakultas_id = $data['fakultas_id'];
        $program_studi_id = $data['program_studi_id'];
        $email = $data['email'];
        $nama = $data['nama'];
        $nim = $data['nim'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $tahun = $data['tahun'];
        $yth_kpd = $data['yth_kpd'];
        $tempat_penelitian = $data['tempat_penelitian'];
        $judul = $data['judul'];
        $created_at = date('Y-m-d');

        $query = "INSERT INTO " . $this->table . " VALUES 
        ('', :fakultas_id, :program_studi_id, :email, :nama, :nim, :tempat_lahir, :tanggal_lahir, :tahun, :yth_kpd, :tempat_penelitian, :judul, :created_at)
        ";

        $this->query($query);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('email', $email);
        $this->bind('nama', $nama);
        $this->bind('nim', $nim);
        $this->bind('tempat_lahir', $tempat_lahir);
        $this->bind('tanggal_lahir', $tanggal_lahir);
        $this->bind('tahun', $tahun);
        $this->bind('yth_kpd', $yth_kpd);
        $this->bind('tempat_penelitian', $tempat_penelitian);
        $this->bind('judul', $judul);
        $this->bind('created_at', $created_at);
        $this->execute();
        return $this->getRowCount();
    }

    public function updateSurat($id, $data)
    {
        $fakultas_id = $data['fakultas_id'];
        $program_studi_id = $data['program_studi_id'];
        $email = $data['email'];
        $nama = $data['nama'];
        $nim = $data['nim'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $tahun = $data['tahun'];
        $yth_kpd = $data['yth_kpd'];
        $tempat_penelitian = $data['tempat_penelitian'];
        $judul = $data['judul'];

        $query = "UPDATE " . $this->table . " SET 
        fakultas_id=:fakultas_id, program_studi_id=:program_studi_id, email=:email, nama=:nama, nim=:nim, tempat_lahir=:tempat_lahir, tanggal_lahir=:tanggal_lahir, tahun=:tahun, yth_kpd=:yth_kpd, tempat_penelitian=:tempat_penelitian, judul=:judul WHERE id=:id
        ";

        $this->query($query);
        $this->bind('id', $id);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('email', $email);
        $this->bind('nama', $nama);
        $this->bind('nim', $nim);
        $this->bind('tempat_lahir', $tempat_lahir);
        $this->bind('tanggal_lahir', $tanggal_lahir);
        $this->bind('tahun', $tahun);
        $this->bind('yth_kpd', $yth_kpd);
        $this->bind('tempat_penelitian', $tempat_penelitian);
        $this->bind('judul', $judul);
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
        WHERE s.judul LIKE :judul OR s.nama LIKE :nama OR s.tahun LIKE :tahun OR ps.program_studi LIKE :program_studi
        ";

        $this->query($query);
        $this->bind('judul', "%$key%");
        $this->bind('nama', "%$key%");
        $this->bind('tahun', "%$key%");
        $this->bind('program_studi', "%$key%");
        return $this->resultAll();
    }
}