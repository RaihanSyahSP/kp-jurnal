<?php
class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = $this->model('User_model');

            if ($userModel->login($username, $password)) {
                $data["success"] = "Login berhasil.";
                header('Location: ' . BASEURL . '/dashboard');
                exit;
            } else {
                $data['error'] = 'Username atau password salah.';
            }
        }

        $this->view('login/index', $data);
    }
}