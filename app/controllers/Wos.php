<?php 

class Wos extends Controller {
    public function index()
    {
        $data['judul'] = 'Wos';
        $this->view('templates/header', $data);
        $this->view('wos/index', $data);
        $this->view('templates/footer');
    }

}