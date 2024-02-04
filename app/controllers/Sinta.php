<?php

class Sinta extends Controller
{
    public function index()
    {
        $data['judul'] = 'Wos';
        $this->view('templates/header', $data);
        $this->view('sinta/index', $data);
        $this->view('templates/footer');
    }

    public function getDataTableSinta()
    {
        $params = $_REQUEST;
        $res = $this->model('Sinta_model')->getAllSintaDoc();
        echo json_encode($res);
    }
}
