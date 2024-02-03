<?php

class Scopus_model
{
    private $tableScopus_doc = 'scopus_documents';
    private $tableScopus_summary = 'scopus_summary';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllScopusDoc()
    {
        // var_dump($params);
        $columns = array(
            0 => "scopus_documents.id",
            1 => "scopus_documents.quartile",
            2 => "scopus_documents.title",
            3 => "scopus_documents.publication_name",
            4 => "scopus_documents.creator",
            5 => "scopus_documents.issn",
            6 => "scopus_documents.volume",
            7 => "scopus_documents.cover_date",
            8 => "scopus_documents.doi",
            9 => "scopus_documents.citedby_count",
            10 => "scopus_documents.aggregation_type",
            11 => "scopus_documents.url",
            12 => "scopus_summary.h_index",
            13 => "scopus_summary.i10_index",
            14 => "scopus_summary.g_index",
            15 => "scopus_summary.g_index_3year",
        );

        ## Request with parameters, define variables
        $params = $_REQUEST;
        $where = "";
        $recordsTotal = $recordsFiltered = 0;

        ## Define conditions
        if (!empty($params['search']['value'])) {
            $where = "WHERE scopus_documents.quartile LIKE '%" . $params['search']['value'] . "%' 
                      OR scopus_documents.title LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.publication_name LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.creator LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.issn LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.volume LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.cover_date LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.doi LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.citedby_count LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.aggregation_type LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_documents.url LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_summary.h_index LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_summary.i10_index LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_summary.g_index LIKE '%" . $params['search']['value'] . "%'
                      OR scopus_summary.g_index_3year LIKE '%" . $params['search']['value'] . "%'";
        }

        ## Convert column array to select value
        $select = implode(", ", $columns);

        ## Fetch data
        $query = "SELECT " . $select .
            " FROM " . $this->tableScopus_doc .
            " JOIN " . $this->tableScopus_summary .
            " ON " . $this->tableScopus_doc . ".id_sinta_author = " . $this->tableScopus_summary . ".id_sinta  " . $where .
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
                    " FROM " . $this->tableScopus_doc .
                    " JOIN " . $this->tableScopus_summary .
                    " ON " . $this->tableScopus_doc . ".id_sinta_author = " . $this->tableScopus_summary . ".id_sinta  " . $where
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
