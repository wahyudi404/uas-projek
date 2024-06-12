<?php

class ProgramStudi extends Controller {

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index() 
    {
        $data['title'] = "Program Studi";
        $data['page'] = "program-studi";

        $this->view('layouts/header', $data);
        
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAll();
        $data['fakultas'] = $this->model('FakultasModel')->getAll();
        $this->view('program-studi/index', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $result = $this->model('ProgramStudiModel')->insertProgramStudi($_POST);
        if($result) {
            Flasher::setFlash('Data program studi berhasil ditambahkan!', 'success');
        } else {
            Flasher::setFlash('Data program studi gagal ditambahkan!', 'danger');
        }
        header('Location: ' . BASE_URL . "program-studi");
    }
    
    public function update($id)
    {
        $result = $this->model('ProgramStudiModel')->updateProgramStudi($id, $_POST);
        if($result) {
            Flasher::setFlash('Data program studi berhasil diperbarui!', 'success');
        } else {
            Flasher::setFlash('Data program studi gagal diperbarui!', 'danger');
        }
        header('Location: ' . BASE_URL . "program-studi");
    }

    public function destroy($id)
    {
        $result = $this->model('ProgramStudiModel')->deleteProgramStudi($id, $_POST);
        if($result) {
            Flasher::setFlash('Data program studi berhasil diperbarui!', 'success');
        } else {
            Flasher::setFlash('Data program studi gagal diperbarui!', 'danger');
        }
        header('Location: ' . BASE_URL . "program-studi");
    }
}