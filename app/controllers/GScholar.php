<?php 

class Gscholar extends Controller {
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

    public function getEditGscholarInfo() {
        $id = $_POST['id'];
        $issn = $_POST['issn'];
        $doi = $_POST['doi'];
        $kolaborasi_mhs = $_POST['kolaborasi_mhs'];
        $koaborasi_non_unikom = $_POST['koaborasi_non_unikom'];

        $res = $this->model('GScholar_model')->editGscholarInfo($id, $issn, $doi, $kolaborasi_mhs, $koaborasi_non_unikom);
        echo json_encode($res);
    }
}