
<?php
class Logout extends Controller
{
    public function index()
    {
        $this->logout();
    }

    private function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/');
        exit();
    }
}
