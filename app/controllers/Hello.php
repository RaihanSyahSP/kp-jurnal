<?php
    class Hello extends Controller {
        public function index()
        {
            $data['judul'] = 'Hello';
            $this->view('templates/header', $data);
            $this->view('hello/index', $data);
            $this->view('templates/footer');
        }
    }
?>