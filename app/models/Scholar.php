<?php 

class Scholar_model {
    private $tableGScholar_doc = 'gscholar_documents';
    private $tableGScholar_info = 'gscholar_info';
    private $tableGScholar_summary = 'gscholar_summary';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllScholarDoc() {
        // var_dump($params);
        $columns = array(
            0 => "gscholar_documents.id",
            1 => "gscholar_documents.title",
            2 => "gscholar_documents.abstract",
            3 => "gscholar_documents.authors",
            4 => "gscholar_documents.journal_name",
            5 => "gscholar_documents.publish_year",
            6 => "gscholar_documents.citation",
            7 => "gscholar_documents.url",
            8 => "gscholar_info.issn",
            9 => "gscholar_info.doi",
            10 => "gscholar_info.kolaborasi_mhs",
            11 => "gscholar_info.koaborasi_non_unikom",
            12 => "gscholar_summary.h_index",
            13 => "gscholar_summary.i10_index",
        );

        ## Request with parameters, define variables
        $params = $_REQUEST;
        $where = "";
        $recordsTotal = $recordsFiltered = 0;

        ## Define conditions
        if (!empty($params['search']['value'])) {
            $where = "WHERE gscholar_documents.authors LIKE '%" . $params['search']['value'] . "%' 
                      OR gscholar_documents.title LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_documents.journal_name LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_documents.publish_year LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_documents.citation LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_documents.url LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_info.issn LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_info.doi LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_info.kolaborasi_mhs LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_info.koaborasi_non_unikom LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_summary.h_index LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_summary.i10_index LIKE '%" . $params['search']['value'] . "%'";

        }

        ## Convert column array to select value
        $select = implode(", ", $columns);

        ## Fetch data
        $query = "SELECT " . $select . 
                " FROM " . $this->tableGScholar_doc . 
                " JOIN " . $this->tableGScholar_info . 
                " ON " . $this->tableGScholar_doc . ".id = " . $this->tableGScholar_info . ".id_t_gscholar  " . 
                " JOIN " . $this->tableGScholar_summary .
                " ON " . $this->tableGScholar_doc . ".id_sinta_author = " . $this->tableGScholar_summary . ".id_sinta " . $where .
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
                    " FROM " . $this->tableGScholar_doc .
                    " JOIN " . $this->tableGScholar_info .
                    " ON " . $this->tableGScholar_doc . ".id = " . $this->tableGScholar_info . ".id_t_gscholar  " .
                    " JOIN " . $this->tableGScholar_summary .
                    " ON " . $this->tableGScholar_doc . ".id_sinta_author = " . $this->tableGScholar_summary . ".id_sinta " . $where
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

    public function editGscholarInfo($id, $issn, $doi, $kolaborasi_mhs, $koaborasi_non_unikom) {
        $query = "UPDATE " . $this->tableGScholar_info .
            " SET " . $this->tableGScholar_info . ".issn = :issn, " .
            $this->tableGScholar_info . ".doi = :doi, " .
            $this->tableGScholar_info . ".kolaborasi_mhs = :kolaborasi_mhs, " .
            $this->tableGScholar_info . ".koaborasi_non_unikom = :koaborasi_non_unikom " .
            " WHERE " . $this->tableGScholar_info . ".id_t_gscholar = :id_t_gscholar";


        $this->db->query($query);
        $this->db->bind('id_t_gscholar', $id);
        $this->db->bind('issn', $issn);
        $this->db->bind('doi', $doi);
        $this->db->bind('kolaborasi_mhs', $kolaborasi_mhs);
        $this->db->bind('koaborasi_non_unikom', $koaborasi_non_unikom);

        return $this->db->execute();
    }


    // public function getMahasiswaById($id)
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    //     $this->db->bind('id', $id);
    //     return $this->db->single();
    // }

    // public function ubahDataMahasiswa($data)
    // {
    //     $query = "UPDATE mahasiswa SET
    //                 nama = :nama,
    //                 nrp = :nrp,
    //                 email = :email,
    //                 jurusan = :jurusan
    //               WHERE id = :id";
        
    //     $this->db->query($query);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('nrp', $data['nrp']);
    //     $this->db->bind('email', $data['email']);
    //     $this->db->bind('jurusan', $data['jurusan']);
    //     $this->db->bind('id', $data['id']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
}