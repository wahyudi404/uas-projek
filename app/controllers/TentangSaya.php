<?php

class TentangSaya extends Controller {

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index()
    {
        $data['page'] = 'tentang-saya';
        $data['title'] = 'Tentang Saya';

        $this->view('layouts/header', $data);
        $this->view('tentang-saya/index');
        $this->view('layouts/footer');
    }
}