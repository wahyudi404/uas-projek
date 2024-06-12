<?php

class SuratKhususModel extends Database
{

    private $table = 'surat_khusus';

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
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
        $query = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $this->query($query);
        $this->bind('id', $id);
        return $this->result();
    }

    public function insertSurat($data)
    {
        $target_dir = "uploads/";
        $filename = time() . '-' . basename($_FILES['upload']['name']);
        $target_file = $target_dir . $filename;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // check if file alredy exists
        if (file_exists($target_file)) return [
            'status' => 0,
            'msg' => 'Nama file sudah ada.'
        ];

        // check file size
        // 20000000 = 20mb
        if ($_FILES['upload']['size'] > 20_000_000) return [
            'status' => 0,
            'msg' => 'Ukuran file maksimal 20MB.'
        ];

        // Allow certain file formats
        if ($fileType != "doc" && $fileType != "docx" && $fileType != "pdf") return [
            'status' => 0,
            'msg' => 'Format file harus .doc, .docx, atau .pdf!'
        ];

        move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);

        $email = $data['email'];
        $nama = $data['nama'];
        $nim = $data['nim'];
        $keterangan = $data['keterangan'];
        $created_at = date('Y-m-d');

        $query = "INSERT INTO " . $this->table . " VALUES 
            ('', :email, :nama, :nim, :filename, :keterangan, :created_at)
            ";

        $this->query($query);
        $this->bind('email', $email);
        $this->bind('nama', $nama);
        $this->bind('nim', $nim);
        $this->bind('filename', $filename);
        $this->bind('keterangan', $keterangan);
        $this->bind('created_at', $created_at);
        $this->execute();
        return [
            'status' => $this->getRowCount(),
            'msg' => $this->getRowCount() ? 'Surat Khusus berhasil ditambah!' : 'Surat Khusus gagal ditambah!'
        ];
    }

    public function updateSurat($id, $data)
    {
        $target_dir = "uploads/";
        $dataGetById = $this->getById($id);
        $filename = $dataGetById['filename']; // ambil nama file lama

        // jika user upload file
        if (!empty($_FILES['upload']['tmp_name'])) {
            $filename_old = $filename;
            $target_file_old = $target_dir . $filename_old; // target file lama

            $filename = time() . '-' . basename($_FILES['upload']['name']); // buat nama file baru
            $target_file = $target_dir . $filename; // buat target file baru
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get extention target file

            #! Validasi
            // check if file alredy exists
            if (file_exists($target_file)) return [
                'status' => 0,
                'msg' => 'Nama file sudah ada.'
            ];

            // check file size
            // 20000000 = 20mb
            if ($_FILES['upload']['size'] > 20_000_000) return [
                'status' => 0,
                'msg' => 'Ukuran file maksimal 20MB.'
            ];

            // Allow certain file formats
            if ($fileType != "doc" && $fileType != "docx" && $fileType != "pdf") return [
                'status' => 0,
                'msg' => 'Format file harus .doc, .docx, atau .pdf!'
            ];
            #! end Validasi

            if (!empty($filename_old) && file_exists($target_file_old)) {
                unlink($target_file_old); // hapus file lama
            }

            move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
        }

        $email = $data['email'];
        $nama = $data['nama'];
        $nim = $data['nim'];
        $keterangan = $data['keterangan'];

        $query = "UPDATE " . $this->table . " SET email=:email, nama=:nama, nim=:nim, filename=:filename, keterangan=:keterangan WHERE id=:id";

        $this->query($query);
        $this->bind('id', $id);
        $this->bind('email', $email);
        $this->bind('nama', $nama);
        $this->bind('nim', $nim);
        $this->bind('filename', $filename);
        $this->bind('keterangan', $keterangan);
        $this->execute();
        return [
            'status' => $this->getRowCount(),
            'msg' => $this->getRowCount() ? 'Surat Khusus berhasil diperbarui!' : 'Surat Khusus gagal diperbarui!'
        ];
    }

    public function deleteSurat($id)
    {
        $target_dir = "uploads/";
        $dataGetById = $this->getById($id);
        $filename = $dataGetById['filename']; // ambil nama file lama
        $target_file = $target_dir . $filename;

        if (!empty($filename) && file_exists($target_file)) unlink($target_file); // hapus file lama

        $this->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->bind('id', $id);
        $this->execute();
        return $this->getRowCount();
    }

    public function getBySearching($post)
    {
        $key = $post['key'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :nama OR nim LIKE :nim OR keterangan LIKE :keterangan";

        $this->query($query);
        $this->bind('nama', "%$key%");
        $this->bind('nim', "%$key%");
        $this->bind('keterangan', "%$key%");
        return $this->resultAll();
    }
}
