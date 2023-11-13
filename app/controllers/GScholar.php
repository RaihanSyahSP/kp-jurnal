<?php 

class GScholar extends Controller {
    public function index()
    {
        $data['judul'] = 'Google Scholar';
        // $data['nama'] = $this->model('User_model')->getUser();
        $data['gscholar'] = $this->model('GScholar_model')->getAllShcolarDoc();
        $this->view('templates/header', $data);
        $this->view('gscholar/index', $data);
        $this->view('templates/footer');
        
    }

    // public function getDataTable() {
    //     // print_r($_GET);
    //     $params = $_GET;
    //     $limit= isset($params['length']) ? $params['length'] : 10;
    //     $res = [
    //         $this->model('GScholar_model')->getAllWithPagination($limit)
    //     ];
    //     echo json_encode($res);
    // }
}