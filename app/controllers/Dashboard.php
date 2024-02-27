<?php

class Dashboard extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function getCitedCountGscholar()
    {
        $params = $_REQUEST;
        $res = $this->model('Dashboard_model')->getCitationCountPerPublicationLecture();
        echo json_encode($res);
    }

    public function getTotalCitedCountGscholar()
    {
        $yearRange = $_GET["yearRange"];
        $years = explode("-", $yearRange);
        $startYear = $years[0];
        $endYear = $years[1];
        $res = $this->model('Dashboard_model')->getTotalCitationCountGscholar($startYear, $endYear);
        echo json_encode($res);
    }

    public function getCountInternationalJournal()
    {
        $params = $_REQUEST;
        $res = $this->model('Dashboard_model')->getPublicationCountInReputableInternationalJournals();
        echo json_encode($res);
    }

    public function getTotalInternationalPublication()
    {
        $yearRange = $_GET["yearRange"];
        $years = explode("-", $yearRange);
        $startYear = $years[0];
        $endYear = $years[1];
        $res = $this->model('Dashboard_model')->getTotalCountInReputableInternationalJournals($startYear, $endYear);
        echo json_encode($res);
    }

    public function getCountBookByLecture() {
        $params = $_REQUEST;
        $res = $this->model('Dashboard_model')->getBookCountByLecture();
        echo json_encode($res);
    }

    public function getTotalBook() {
        $yearRange = $_GET["yearRange"];
        $years = explode("-", $yearRange);
        $startYear = $years[0];
        $endYear = $years[1];
        $res = $this->model('Dashboard_model')->getTotalBookCount($startYear, $endYear);
        echo json_encode($res);
    }

    public function getTotalISSNPublication() {
        $yearRange = $_GET["yearRange"];
        $years = explode("-", $yearRange);
        $startYear = $years[0];
        $endYear = $years[1];
        $res = $this->model('Dashboard_model')->getTotalISSNJournal($startYear, $endYear);
        echo json_encode($res);
    }

    public function getAllISSNJournal() {
        $params = $_REQUEST;
        $res = $this->model('Dashboard_model')->getISSNJournal();
        echo json_encode($res);
    }

    public function  getPublicationCountLast5YearsGscholar()
    {
        $res = $this->model('Dashboard_model')->getPublicationCountLast5YearsGscholar();
        echo json_encode($res);
    }

    public function getPublicationCountLast5YearsScopus()
    {
        $res = $this->model('Dashboard_model')->getPublicationCountLast5YearsScopus();
        echo json_encode($res);
    }

    public function getPublicationCountLast5YearsWos()
    {
        $res = $this->model('Dashboard_model')->getPublicationCountLast5YearsWos();
        echo json_encode($res);
    }

     public function getTopTenSintaV3OverallScore()
     {
        $res = $this->model('Dashboard_model')->getTopTenSintaV3OverallScore();
        echo json_encode($res);
     }

}
