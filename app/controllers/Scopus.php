<?php 

class Scopus extends Controller {
    public function index()
    {
        $data['judul'] = 'Scopus';
        $this->view('templates/header', $data);
        $this->view('scopus/index', $data);
        $this->view('templates/footer');
    }

    public function getDataTableScopus()
    {
        $params = $_REQUEST;
        $res = $this->model('Scopus_model')->getAllScopusDoc();
        echo json_encode($res);
    }
}




