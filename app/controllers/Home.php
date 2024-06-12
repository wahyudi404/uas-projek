<?php

class Home extends Controller {

    public function __construct()
    {
        if(!isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function index() 
    {
        $data['page'] = 'home';
        
        $this->view('layouts/header', $data);
        $data['users'] = $this->model('UserModel')->getCount();
        $data['surat_ijin_penelitian'] = $this->model('SuratIjinPenelitianModel')->getCount();
        $data['surat_ket_mhs'] = $this->model('SuratKetMhsModel')->getCount();
        $data['surat_ket_mhs_aktif'] = $this->model('SuratKetMhsAktifModel')->getCount();
        $data['surat_khusus'] = $this->model('SuratKhususModel')->getCount();
        $data['surat_rekomendasi_kampus'] = $this->model('SuratRekomendasiKampusModel')->getCount();
        $data['surat_umum'] = $this->model('SuratUmumModel')->getCount();
        
        $this->view('home/index', $data);
        $this->view('layouts/footer');
    }
}