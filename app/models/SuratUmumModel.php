<?php 

class SuratUmumModel extends Database 
{

    private $table = 'surat_umum';

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
        $perihal = $data['perihal'];
        $penerima = $data['penerima'];
        $kota_tujuan = $data['kota_tujuan'];
        $mengadakan_untuk = $data['mengadakan_untuk'];
        $matkul = $data['matkul'];
        $dosen_pembimbing = $data['dosen_pembimbing'];
        $tujuan_instansi = $data['tujuan_instansi'];
        $nama_mhs = $data['nama_mhs'];
        $nim = $data['nim'];
        $program_studi_id = $data['program_studi_id'];
        $fakultas_id = $data['fakultas_id'];
        $created_at = date('Y-m-d');

        $query = "INSERT INTO " . $this->table . " VALUES 
        ('', :email, :tahun_sekarang, :perihal, :penerima, :kota_tujuan, :mengadakan_untuk, :matkul, :dosen_pembimbing, :tujuan_instansi, :nama_mhs, :nim, :program_studi_id, :fakultas_id, :created_at)
        ";

        $this->query($query);
        $this->bind('email', $email);
        $this->bind('tahun_sekarang', $tahun_sekarang);
        $this->bind('perihal', $perihal);
        $this->bind('penerima', $penerima);
        $this->bind('kota_tujuan', $kota_tujuan);
        $this->bind('mengadakan_untuk', $mengadakan_untuk);
        $this->bind('matkul', $matkul);
        $this->bind('dosen_pembimbing', $dosen_pembimbing);
        $this->bind('tujuan_instansi', $tujuan_instansi);
        $this->bind('nama_mhs', $nama_mhs);
        $this->bind('nim', $nim);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('fakultas_id', $fakultas_id);
        $this->bind('created_at', $created_at);
        $this->execute();
        return $this->getRowCount();
    }

    public function updateSurat($id, $data)
    {
        $email = $data['email'];
        $tahun_sekarang = $data['tahun_sekarang'];
        $perihal = $data['perihal'];
        $penerima = $data['penerima'];
        $kota_tujuan = $data['kota_tujuan'];
        $mengadakan_untuk = $data['mengadakan_untuk'];
        $matkul = $data['matkul'];
        $dosen_pembimbing = $data['dosen_pembimbing'];
        $tujuan_instansi = $data['tujuan_instansi'];
        $nama_mhs = $data['nama_mhs'];
        $nim = $data['nim'];
        $program_studi_id = $data['program_studi_id'];
        $fakultas_id = $data['fakultas_id'];
        
        $query = "UPDATE " . $this->table . " SET 
        email=:email, tahun_sekarang=:tahun_sekarang, perihal=:perihal, penerima=:penerima, kota_tujuan=:kota_tujuan, mengadakan_untuk=:mengadakan_untuk, matkul=:matkul, dosen_pembimbing=:dosen_pembimbing, tujuan_instansi=:tujuan_instansi, nama_mhs=:nama_mhs, nim=:nim, program_studi_id=:program_studi_id, fakultas_id=:fakultas_id WHERE id=:id
        ";

        $this->query($query);
        $this->bind('id', $id);
        $this->bind('email', $email);
        $this->bind('tahun_sekarang', $tahun_sekarang);
        $this->bind('perihal', $perihal);
        $this->bind('penerima', $penerima);
        $this->bind('kota_tujuan', $kota_tujuan);
        $this->bind('mengadakan_untuk', $mengadakan_untuk);
        $this->bind('matkul', $matkul);
        $this->bind('dosen_pembimbing', $dosen_pembimbing);
        $this->bind('tujuan_instansi', $tujuan_instansi);
        $this->bind('nama_mhs', $nama_mhs);
        $this->bind('nim', $nim);
        $this->bind('program_studi_id', $program_studi_id);
        $this->bind('fakultas_id', $fakultas_id);
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
        WHERE s.perihal LIKE :perihal OR s.penerima LIKE :penerima OR s.nama_mhs LIKE :nama_mhs OR ps.program_studi LIKE :program_studi
        ";

        $this->query($query);
        $this->bind('perihal', "%$key%");
        $this->bind('penerima', "%$key%");
        $this->bind('nama_mhs', "%$key%");
        $this->bind('program_studi', "%$key%");
        return $this->resultAll();
    }
}