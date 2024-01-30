<?php 

class Wos extends Controller {
    public function index()
    {
        $data['judul'] = 'Wos';
        $this->view('templates/header', $data);
        $this->view('wos/index', $data);
        $this->view('templates/footer');
    }

    public function getDataTableWos()
    {
        $params = $_REQUEST;
        $res = $this->model('Wos_model')->getAllWosDoc();
        echo json_encode($res);
    }

}