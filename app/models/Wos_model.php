<?php

class Wos_model
{
    private $tableWos_doc = 'wos_documents';
    private $tableWos_summary = 'wos_summary';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllWosDoc()
    {
        // var_dump($params);
        $columns = array(
            0 => "wos_documents.id",
            1 => "wos_documents.doi",
            2 => "wos_documents.title",
            3 => "wos_documents.first_author",
            4 => "wos_documents.last_author",
            5 => "wos_documents.authors",
            6 => "wos_documents.publish_date",
            7 => "wos_documents.journal_name",
            8 => "wos_documents.citation",
            9 => "wos_documents.publish_type",
            10 => "wos_documents.publish_year",
            11 => "wos_documents.issn",
            12 => "wos_documents.eissn",
            13 => "wos_documents.url",
        );

        ## Request with parameters, define variables
        $params = $_REQUEST;
        $where = "";
        $recordsTotal = $recordsFiltered = 0;

        ## Define conditions
        if (!empty($params['search']['value'])) {
            $where = " WHERE wos_documents.doi LIKE '%" . $params['search']['value'] . "%' 
                      OR wos_documents.title LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.first_author LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.last_author LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.authors LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.publish_date LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.journal_name LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.citation LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.publish_type LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.publish_year LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.issn LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.eissn LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.url LIKE '%" . $params['search']['value'] . "%'";
        }

        ## Convert column array to select value
        $select = implode(", ", $columns);

        ## Fetch data
        $query = "SELECT " . $select .
            " FROM " . $this->tableWos_doc . $where .
            " ORDER BY " . $columns[$params['order'][0]['column']] . " " . $params['order'][0]['dir'] .
            " LIMIT " . $params['start'] . "," . $params['length'] . "";

        $this->db->query($query);
        // print_r($query);
        $documentsResult = $this->db->resultSet();

        ## If data found, set an array for response
        if ($documentsResult) {
            ## Total count for recordsTotal & recordsFiltered
            $this->db->query(
                "SELECT COUNT(*) as total " .
                    " FROM " . $this->tableWos_doc . $where
            );

            $totalQueryResult = $this->db->single();
            $recordsTotal = $totalQueryResult['total'];
            $recordsFiltered = $recordsTotal; // Jika tidak ada kondisi WHERE pada jumlah total, maka sama dengan jumlah total
        }

        return array(
            "draw" => intval($params['draw']),
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            "data" => $documentsResult
        );
    }

    // public function editGscholarInfo($id, $issn, $doi, $kolaborasi_mhs, $koaborasi_non_unikom)
    // {
    //     $query = "UPDATE " . $this->tableGScholar_info .
    //         " SET " . $this->tableGScholar_info . ".issn = :issn, " .
    //         $this->tableGScholar_info . ".doi = :doi, " .
    //         $this->tableGScholar_info . ".kolaborasi_mhs = :kolaborasi_mhs, " .
    //         $this->tableGScholar_info . ".koaborasi_non_unikom = :koaborasi_non_unikom " .
    //         " WHERE " . $this->tableGScholar_info . ".id_t_gscholar = :id_t_gscholar";


    //     $this->db->query($query);
    //     $this->db->bind('id_t_gscholar', $id);
    //     $this->db->bind('issn', $issn);
    //     $this->db->bind('doi', $doi);
    //     $this->db->bind('kolaborasi_mhs', $kolaborasi_mhs);
    //     $this->db->bind('koaborasi_non_unikom', $koaborasi_non_unikom);

    //     return $this->db->execute();
    // }
}
