<?php

class Sinta_model {
    private $tableAuthors = 'authors';
    private $tableGscholar_doc = 'gscholar_documents';
    private $tableScopus_doc = 'scopus_documents';
    private $tableWos_doc = 'wos_documents';
    private $tableGscholar_info = 'gscholar_info';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSintaDoc()
    {
        // var_dump($params);
        $columnsGscholar = array(
            0 => "gscholar_documents.id",
            1 => "authors.fullname",
            2 => "authors.id_sinta AS id_sinta_author",
            3 => "gscholar_documents.title",
            4 => "gscholar_documents.journal_name",
            5 => "gscholar_documents.authors",
            6 => "gscholar_documents.publish_year",
            7 => "gscholar_info.issn",
            8 => "gscholar_info.doi",
            9 => "gscholar_documents.citation",
            10 => "gscholar_documents.url",
            11 => "gscholar_info.kolaborasi_mhs",
            12 => "gscholar_info.koaborasi_non_unikom",
            13 => "authors.sinta_score_v3_3year AS score_sinta_v3_3year",
            14 => "authors.sinta_score_v3_overall AS score_sinta_v3_overall",
            15 => "authors.index_scopus",
            16 => "authors.index_wos",
        );

        $columnsScopus = array(
            0 => "scopus_documents.id",
            1 => "authors.fullname",
            2 => "authors.id_sinta AS id_sinta_author",
            3 => "scopus_documents.title",
            4 => "scopus_documents.publication_name",
            5 => "scopus_documents.creator",
            6 => "scopus_documents.cover_date",
            7 => "scopus_documents.issn",
            8 => "scopus_documents.doi",
            9 => "scopus_documents.citedby_count",
            10 => "scopus_documents.url",
            11 => "NULL AS kolaborasi_mhs",
            12 => "NULL AS koaborasi_non_unikom",
            13 => "authors.sinta_score_v3_3year AS score_sinta_v3_3year",
            14 => "authors.sinta_score_v3_overall AS score_sinta_v3_overall",
            15 => "authors.index_scopus",
            16 => "authors.index_wos",
        );

        $columnsWos = array(
            0 => "wos_documents.id",
            1 => "authors.fullname",
            2 => "authors.id_sinta AS id_sinta_author",
            3 => "wos_documents.title",
            4 => "wos_documents.journal_name",
            5 => "wos_documents.authors",
            6 => "wos_documents.publish_year",
            7 => "wos_documents.issn",
            8 => "wos_documents.doi",
            9 => "wos_documents.citation",
            10 => "wos_documents.url",
            11 => "NULL AS kolaborasi_mhs",
            12 => "NULL AS koaborasi_non_unikom",
            13 => "authors.sinta_score_v3_3year AS score_sinta_v3_3year",
            14 => "authors.sinta_score_v3_overall AS score_sinta_v3_overall",
            15 => "authors.index_scopus",
            16 => "authors.index_wos",
        );

        $columnOrder = array(
            0 => "id",
            1 => "fullname",
            2 => "id_sinta_author",
            3 => "title",
            4 => "journal_name",
            5 => "authors",
            6 => "publish_year",
            7 => "issn",
            8 => "doi",
            9 => "citation",
            10 => "url",
            11 => "kolaborasi_mhs",
            12 => "koaborasi_non_unikom",
            13 => "score_sinta_v3_3year",
            14 => "score_sinta_v3_overall",
            15 => "index_scopus",
            16 => "index_wos",
        );

        ## Request with parameters, define variables
        $params = $_REQUEST;
        $whereGscholar = "";
        $whereScopus = "";
        $whereWos = "";
        $recordsTotal = $recordsFiltered = 0;

        ## Define conditions
        if (!empty($params['search']['value'])) {
            $whereWos = " WHERE wos_documents.doi LIKE '%" . $params['search']['value'] . "%' 
                      OR wos_documents.title LIKE '%" . $params['search']['value'] . "%'
                      OR authors.id_sinta LIKE '%" . $params['search']['value'] . "%'
                      OR authors.fullname LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.authors LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.journal_name LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.citation LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.publish_year LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.issn LIKE '%" . $params['search']['value'] . "%'
                      OR wos_documents.url LIKE '%" . $params['search']['value'] . "%'";
        }

        // Untuk gscholar_documents
        if (!empty($params['search']['value'])) {
            $whereGscholar = " WHERE gscholar_info.doi LIKE '%" . $params['search']['value'] . "%' 
              OR gscholar_documents.title LIKE '%" . $params['search']['value'] . "%'
              OR authors.id_sinta LIKE '%" . $params['search']['value'] . "%'
              OR authors.fullname LIKE '%" . $params['search']['value'] . "%'
              OR gscholar_documents.authors LIKE '%" . $params['search']['value'] . "%'
              OR gscholar_documents.journal_name LIKE '%" . $params['search']['value'] . "%'
              OR gscholar_documents.citation LIKE '%" . $params['search']['value'] . "%'
              OR gscholar_documents.publish_year LIKE '%" . $params['search']['value'] . "%'
              OR gscholar_info.issn LIKE '%" . $params['search']['value'] . "%'
              OR gscholar_documents.url LIKE '%" . $params['search']['value'] . "%'";
        }

        // // Untuk scopus_documents
        if (!empty($params['search']['value'])) {
            $whereScopus = " WHERE scopus_documents.doi LIKE '%" . $params['search']['value'] . "%' 
              OR scopus_documents.title LIKE '%" . $params['search']['value'] . "%'
              OR authors.id_sinta LIKE '%" . $params['search']['value'] . "%'
              OR authors.fullname LIKE '%" . $params['search']['value'] . "%'
              OR scopus_documents.publication_name LIKE '%" . $params['search']['value'] . "%'
              OR scopus_documents.creator LIKE '%" . $params['search']['value'] . "%'
              OR scopus_documents.cover_date LIKE '%" . $params['search']['value'] . "%'
              OR scopus_documents.issn LIKE '%" . $params['search']['value'] . "%'
              OR scopus_documents.url LIKE '%" . $params['search']['value'] . "%'";
        }


        ## Convert column array to select value
        $selectGscholar = implode(", ", $columnsGscholar);
        $selectScopus = implode(", ", $columnsScopus);
        $selectWos = implode(", ", $columnsWos);

        ## Fetch data
        $query = "SELECT " . $selectGscholar .
            " FROM " . $this->tableAuthors . 
            " JOIN " . $this->tableGscholar_doc . " ON authors.id_sinta = gscholar_documents.id_sinta_author" .
            " JOIN " . $this->tableGscholar_info . " ON gscholar_documents.id = gscholar_info.id_t_gscholar" .            
            $whereGscholar .
            " UNION " .
            "SELECT " . $selectScopus .
            " FROM " . $this->tableAuthors .
            " JOIN " . $this->tableScopus_doc . " ON authors.id_sinta = scopus_documents.id_sinta_author" .
            $whereScopus .
            " UNION " .
            "SELECT " . $selectWos .
            " FROM " . $this->tableAuthors .
            " JOIN " . $this->tableWos_doc . " ON authors.id_sinta = wos_documents.id_sinta_author" .
            $whereWos .
            // " ORDER BY " . $columnOrder[$params['order'][0]['column']] . " " . $params['order'][0]['dir'] .
            " LIMIT " . $params['start'] . "," . $params['length'] . "";

        $this->db->query($query);
        // print_r($query);
        $documentsResult = $this->db->resultSet();

        ## If data found, set an array for response
        if ($documentsResult) {
            ## Total count for recordsTotal & recordsFiltered
            $this->db->query(
                "SELECT COUNT(*) as total " .
                    " FROM (" .
                    "SELECT " . $selectGscholar .
                    " FROM " . $this->tableAuthors .
                    " JOIN " . $this->tableGscholar_doc . " ON authors.id_sinta = gscholar_documents.id_sinta_author" .
                    " JOIN " . $this->tableGscholar_info . " ON gscholar_documents.id = gscholar_info.id_t_gscholar" .
                    $whereGscholar .
                    " UNION " .
                    "SELECT " . $selectScopus .
                    " FROM " . $this->tableAuthors .
                    " JOIN " . $this->tableScopus_doc . " ON authors.id_sinta = scopus_documents.id_sinta_author" .
                    $whereScopus .
                    " UNION " .
                    "SELECT " . $selectWos .
                    " FROM " . $this->tableAuthors .
                    " JOIN " . $this->tableWos_doc . " ON authors.id_sinta = wos_documents.id_sinta_author" .
                    $whereWos .
                    ") AS sinta_table"
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
}    


?>