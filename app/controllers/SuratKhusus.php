<?php

class SuratKhusus extends Controller
{

    private $page = 'surat-khusus';

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index() 
    {
        $data['page'] = $this->page;
        $data['title'] = 'Surat Khusus';
        $data['pagination'] = true;
        
        $this->view('layouts/header', $data);
        $data['surat'] = $this->model('SuratKhususModel')->getAll();

        if(!empty($_POST)) {
            $data['surat'] = $this->model('SuratKhususModel')->getBySearching($_POST);
        }
        
        $data['fakultas'] = $this->model('FakultasModel')->getAll();
        $this->view('surat-khusus/index', $data);
        $this->view('layouts/footer', $data);
    }

    // public function detail($id)
    // {
    //     $data['page'] = $this->page;
    //     $data['title'] = 'Detail Surat Khusus';

    //     $this->view('layouts/header', $data);

    //     $data['surat'] = $this->model('SuratKhususModel')->getById($id);
    //     $this->view('surat-khusus/detail', $data);
    //     $this->view('layouts/footer');
    // }

    public function store()
    {
        $result = $this->model('SuratKhususModel')->insertSurat($_POST);
        if($result['status']) {
            Flasher::setFlash($result['msg'], 'success');
        } else {
            Flasher::setFlash($result['msg'], 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }

    public function update($id)
    {
        $result = $this->model('SuratKhususModel')->updateSurat($id, $_POST);
        if($result['status']) {
            Flasher::setFlash($result['msg'], 'success');
        } else {
            Flasher::setFlash($result['msg'], 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }

    public function destroy($id)
    {
        $result = $this->model('SuratKhususModel')->deleteSurat($id);
        if($result) {
            Flasher::setFlash('Surat Khusus berhasil dihapus!', 'success');
        } else {
            Flasher::setFlash('Surat Khusus gagal dihapus!', 'danger');
        }
        header('Location: ' . BASE_URL . $this->page);
    }
    
    public function filter_program_studi($fakultas_id)
    {
        $result = $this->model('ProgramStudiModel')->getByFakultasId($fakultas_id);
        echo json_encode($result);
    }
}