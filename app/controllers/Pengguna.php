<?php

class Pengguna extends Controller 
{

    private $page = 'pengguna';

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index() 
    {
        $data['page'] = $this->page;
        $data['title'] = 'Pengguna';
        
        $this->view('layouts/header', $data);
        $data['pengguna'] = $this->model('UserModel')->getAll();

        if(!empty($_POST)) {
            $data['pengguna'] = $this->model('UserModel')->getBySearching($_POST);
        }

        $this->view('pengguna/index', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $result = $this->model('UserModel')->created($_POST);
        if($result['status']) {
            Flasher::setFlash($result['msg'], 'success');
        } else {
            Flasher::setFlash($result['msg'], 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }

    public function update($id)
    {
        $result = $this->model('UserModel')->updated($id, $_POST);
        if($result['status']) {
            Flasher::setFlash($result['msg'], 'success');
        } else {
            Flasher::setFlash($result['msg'], 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }

    public function destroy($id)
    {
        $result = $this->model('UserModel')->deleted($id);
        if($result) {
            Flasher::setFlash('Pengguna berhasil dihapus!', 'success');
        } else {
            Flasher::setFlash('Pengguna gagal dihapus!', 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }
}