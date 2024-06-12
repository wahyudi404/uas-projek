<?php

class KontakSaya extends Controller {

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index()
    {
        $data['page'] = 'kontak-saya';
        $data['title'] = 'Kontak';

        $this->view('layouts/header', $data);
        $this->view('kontak-saya/index');
        $this->view('layouts/footer');
    }
}