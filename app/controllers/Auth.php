<?php

class Auth extends Controller {

    public function __construct()
    {
        if(isset($_SESSION['auth'])) {
            header('Location: ' . BASE_URL);
        }
    }

    public function index()
    {
        $data['page'] = 'login';
        $data['title'] = 'Login';

        $this->view('auth/login', $data);
    }

    public function login()
    {
        // Handle SQL Injection => " OR "1" == "1
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->model('AuthModel')->login($username, $password);
        
        if($result !== 0) {
            $_SESSION['auth'] = $result['name'];
            header('Location: ' . BASE_URL);
        } else {
            Flasher::setFlash('Email atau password salah!', 'danger');
            header('Location: ' . BASE_URL . 'auth');
        }
    }

    public function logout()
    {
        if(isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
            session_destroy();
        }
    }
}