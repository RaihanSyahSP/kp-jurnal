<?php 

class GScholar extends Controller {
    public function index()
    {
        $data['judul'] = 'Google Scholar';        
        $this->view('templates/header', $data);
        $this->view('gscholar/index', $data);
        $this->view('templates/footer');
        
    }


    public function getDataTableGScholar() {
        $params = $_REQUEST;
        $res = $this->model('GScholar_model')->getAllScholarDoc();
        echo json_encode($res);
    }
}