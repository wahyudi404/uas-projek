<?php

class Fakultas extends Controller {

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Fakultas';
        $data['page'] = 'fakultas';
        $this->view('layouts/header', $data);

        $data['fakultas'] = $this->model('FakultasModel')->getAll();
        
        $this->view('fakultas/index', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $result = $this->model('FakultasModel')->addFakultas($_POST);
        if($result) {
            Flasher::setFlash('Data fakultas berhasil ditambahkan!', 'success');
        } else {
            Flasher::setFlash('Data fakultas gagal ditambahkan!', 'danger');
        }
        header('Location: ' . BASE_URL . 'fakultas');
    }

    public function update($id)
    {
        $result = $this->model('FakultasModel')->updateFakultas($id, $_POST);
        if($result) {
            Flasher::setFlash('Data fakultas berhasil diperbarui!', 'success');
        } else {
            Flasher::setFlash('Data fakultas gagal diperbarui!', 'danger');
        }
        header('Location: ' . BASE_URL . 'fakultas');
    }

    public function destroy($id)
    {
        $result = $this->model('FakultasModel')->deleteFakultas($id);
        if($result) {
            Flasher::setFlash('Data fakultas berhasil dihapus!', 'success');
        } else {
            Flasher::setFlash('Data fakultas gagal dihapus!', 'danger');
        }
        header('Location: ' . BASE_URL . 'fakultas');
    }
}