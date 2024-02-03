<?php

class Dashboard_model
{
    private $tableGscholar_doc = 'gscholar_documents';
    private $tableAuthors = 'authors';
    private $tableWos_doc = 'wos_documents';
    private $tableScopus_doc = 'scopus_documents';
    private $tableBook_summary = 'book_summary';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCitationCountPerPublicationLecture()
    {
        // var_dump($params);
        $columns = array(
            0 => "gscholar_documents.id",
            1 => "gscholar_documents.title",
            2 => "authors.fullname",
            3 => "gscholar_documents.citation", 
        );

        ## Request with parameters, define variables
        $params = $_REQUEST;
        $where = "";
        $recordsTotal = $recordsFiltered = 0;

        ## Define conditions
        if (!empty($params['search']['value'])) {
            $where = " WHERE gscholar_documents.id LIKE '%" . $params['search']['value'] . "%' 
                      OR gscholar_documents.title LIKE '%" . $params['search']['value'] . "%'
                      OR authors.fullname LIKE '%" . $params['search']['value'] . "%'
                      OR gscholar_documents.citation LIKE '%" . $params['search']['value'] . "%'";
        }

        // Add condition for publish_year greater than 2019
        $publishYearCondition = " AND gscholar_documents.publish_year > 2018";
        $where .= $publishYearCondition;

        ## Convert column array to select value
        $select = implode(", ", $columns);

        ## Fetch data
        $query = "SELECT " . $select . 
            " FROM " . $this->tableGscholar_doc .
            " JOIN " . $this->tableAuthors .
            " ON " . $this->tableGscholar_doc . ".id_sinta_author = " . $this->tableAuthors . ".id_sinta  " . $where .
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
                    " FROM " . $this->tableGscholar_doc . 
                    " JOIN " . $this->tableAuthors .
                    " ON " . $this->tableGscholar_doc . ".id_sinta_author = " . $this->tableAuthors . ".id_sinta  " . $where 
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

    public function getTotalCitationCountGscholar()
    {
        $this->db->query(
            "SELECT SUM(citation) as total " .
                " FROM " . $this->tableGscholar_doc . 
                " WHERE publish_year > 2018"
        );

        $totalQueryResult = $this->db->single();
        $recordsTotal = $totalQueryResult['total'];

        return $recordsTotal;
    }

    public function getPublicationCountInReputableInternationalJournals () 
    { {
            // var_dump($params);
            $columns = array(
                0 => "authors.id",
                1 => "authors.fullname",
                2 => "COUNT(DISTINCT scopus_documents.id) + COUNT(DISTINCT wos_documents.id) AS total_publikasi_internasional",
            );

            ## Request with parameters, define variables
            $params = $_REQUEST;
            $where = "";
            $recordsTotal = $recordsFiltered = 0;

            ## Define conditions
            if (!empty($params['search']['value'])) {
                $where = " WHERE authors.id LIKE '%" . $params['search']['value'] . "%' 
                      OR authors.fullname LIKE '%" . $params['search']['value'] . "%'";
            }

            ## Convert column array to select value
            $select = implode(", ", $columns);

            ## Fetch data
            $query = "SELECT authors.id, authors.fullname AS dosen_name, " .
            "COUNT(DISTINCT scopus_documents.id) + COUNT(DISTINCT wos_documents.id) AS total_publikasi_internasional "  .
            "FROM authors " .
            "LEFT JOIN " . $this->tableScopus_doc . " ON authors.id_sinta = " . $this->tableScopus_doc . ".id_sinta_author  " .
            "LEFT JOIN wos_documents ON authors.id_sinta = wos_documents.id_sinta_author " .
            $where .
            " GROUP BY authors.id, authors.fullname " .
            "ORDER BY " . $columns[$params['order'][0]['column']] . " " . $params['order'][0]['dir'] .
            " LIMIT " . $params['start'] . "," . $params['length'] . "";

            $this->db->query($query);
            $documentsResult = $this->db->resultSet();

            ## If data found, set an array for response
            if ($documentsResult) {
                ## Total count for recordsTotal & recordsFiltered
                $this->db->query(
                    "SELECT COUNT(DISTINCT authors.id) as total " .
                    "FROM authors " .
                    "LEFT JOIN " . $this->tableScopus_doc . " ON authors.id_sinta = " . $this->tableScopus_doc . ".id_sinta_author  " .
                    "LEFT JOIN " . $this->tableWos_doc ." ON authors.id_sinta = " . $this->tableWos_doc .  ".id_sinta_author " .
                    $where
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
    
    public function getTotalCountInReputableInternationalJournals () {
        $this->db->query(
            "SELECT COUNT(DISTINCT scopus_documents.id) + COUNT(DISTINCT wos_documents.id) AS total_publikasi_internasional " .
                " FROM authors " .
                " LEFT JOIN " . $this->tableScopus_doc . " ON authors.id_sinta = " . $this->tableScopus_doc . ".id_sinta_author  " .
                " LEFT JOIN wos_documents ON authors.id_sinta = wos_documents.id_sinta_author " 
        );

        $totalQueryResult = $this->db->single();
        $recordsTotal = $totalQueryResult['total_publikasi_internasional'];

        return $recordsTotal;
    }

    public function getBookCountByLecture()
    { {
            // var_dump($params);
            $columns = array(
                0 => "book_summary.id",
                1 => "authors.fullname",
                2 => "book_summary.total_document",
            );

            ## Request with parameters, define variables
            $params = $_REQUEST;
            $where = "";
            $recordsTotal = $recordsFiltered = 0;

            ## Define conditions
            if (!empty($params['search']['value'])) {
                $where = " WHERE authors.fullname LIKE '%" . $params['search']['value'] . "%' 
                      OR book_summary.total_document LIKE '%" . $params['search']['value'] . "%'";
            }

            ## Convert column array to select value
            $select = implode(", ", $columns);

            ## Fetch data
            $query = "SELECT book_summary.id, authors.fullname, book_summary.total_document " .
            "FROM book_summary " .
            "JOIN " . $this->tableAuthors . " ON authors.id_sinta = " . $this->tableBook_summary . ".id_sinta  " .
            $where .
            "ORDER BY " . $columns[$params['order'][0]['column']] . " " . $params['order'][0]['dir'] .
            " LIMIT " . $params['start'] . "," . $params['length'] . "";

            $this->db->query($query);
            $documentsResult = $this->db->resultSet();

            ## If data found, set an array for response
            if ($documentsResult) {
                ## Total count for recordsTotal & recordsFiltered
                $this->db->query(
                    "SELECT COUNT(DISTINCT book_summary.id) as total " .
                    "FROM book_summary " .
                    "JOIN " . $this->tableAuthors . " ON authors.id_sinta = " . $this->tableBook_summary . ".id_sinta  " .
                    $where 
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

    public function getTotalBookCount()
    {
        $this->db->query(
            "SELECT COUNT(DISTINCT book_summary.id) as total " .
                " FROM book_summary " .
                " JOIN " . $this->tableAuthors . " ON authors.id_sinta = " . $this->tableBook_summary . ".id_sinta  " 
        );

        $totalQueryResult = $this->db->single();
        $recordsTotal = $totalQueryResult['total'];

        return $recordsTotal;
    }

    public function getTotalISSNJournal() {
        $this->db->query(
            "SELECT COUNT(DISTINCT scopus_documents.id) + COUNT(DISTINCT wos_documents.id) as total
            FROM scopus_documents
            JOIN authors ON scopus_documents.id_sinta_author = authors.id_sinta
            JOIN wos_documents ON authors.id_sinta = wos_documents.id_sinta_author
            WHERE wos_documents.issn != '' AND scopus_documents.issn != '';"
        );

        $totalQueryResult = $this->db->single();
        $recordsTotal = $totalQueryResult['total'];

        return $recordsTotal;
    }

    public function getISSNJournal()
    {
        $columns = array(
            0 => "id",
            1 => "title",
        );

        // Request with parameters, define variables
        $params = $_REQUEST;
        $where = "";
        $recordsTotal = $recordsFiltered = 0;

        // Add condition for ISSN not empty
        $issnCondition = " WHERE wos_documents.issn != '' AND scopus_documents.issn != ''";
        $where .= $issnCondition;

        // Convert column array to select value
        $select = implode(", ", $columns);

        // Fetch data
        $query = "SELECT " . $select .
            " FROM (" .
            "    SELECT scopus_documents.id, scopus_documents.title" .
            "    FROM scopus_documents" .
            "    JOIN authors ON scopus_documents.id_sinta_author = authors.id_sinta" .
            "    JOIN wos_documents ON authors.id_sinta = wos_documents.id_sinta_author" .
            $where .
            "    UNION" .
            "    SELECT wos_documents.id, wos_documents.title" .
            "    FROM wos_documents" .
            "    JOIN authors ON wos_documents.id_sinta_author = authors.id_sinta" .
            "    JOIN scopus_documents ON authors.id_sinta = scopus_documents.id_sinta_author" .
            $where .
            ") AS combined_data" .
            " ORDER BY " . $columns[$params['order'][0]['column']] . " " . $params['order'][0]['dir'] .
            " LIMIT " . $params['start'] . "," . $params['length'] . "";

        $this->db->query($query);
        $documentsResult = $this->db->resultSet();

        // If data found, set an array for response
        if ($documentsResult) {
            // Total count for recordsTotal & recordsFiltered
            $this->db->query(
                "SELECT COUNT(*) as total FROM (" .
                    "    SELECT scopus_documents.id" .
                    "    FROM scopus_documents" .
                    "    JOIN authors ON scopus_documents.id_sinta_author = authors.id_sinta" .
                    "    JOIN wos_documents ON authors.id_sinta = wos_documents.id_sinta_author" .
                    $where .
                    "    UNION" .
                    "    SELECT wos_documents.id" .
                    "    FROM wos_documents" .
                    "    JOIN authors ON wos_documents.id_sinta_author = authors.id_sinta" .
                    "    JOIN scopus_documents ON authors.id_sinta = scopus_documents.id_sinta_author" .
                    $where .
                    ") AS combined_data"
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

    public function getPublicationCountLast5YearsGscholar()
    {
        $query =
            "SELECT publish_year, COUNT(publish_year) as count FROM " . $this->tableGscholar_doc .
            " WHERE publish_year >= YEAR(CURDATE()) - 5" .
            " GROUP BY publish_year ORDER BY publish_year";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getPublicationCountLast5YearsScopus()
    {
        $query =
            "SELECT YEAR(scopus_documents.cover_date) AS year, COUNT(scopus_documents.cover_date) AS count FROM " . $this->tableScopus_doc .
            " WHERE scopus_documents.cover_date >= CURDATE() - INTERVAL 5 YEAR" .
            " GROUP BY YEAR(scopus_documents.cover_date)" .
            " ORDER BY YEAR(scopus_documents.cover_date)";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getPublicationCountLast5YearsWos()
    {
        $query =
            "SELECT publish_year, COUNT(publish_year) as count FROM " . $this->tableWos_doc .
            " WHERE publish_year >= YEAR(CURDATE()) - 5" .
            " GROUP BY publish_year ORDER BY publish_year";
        $this->db->query($query);
        return $this->db->resultSet();
    }

}
