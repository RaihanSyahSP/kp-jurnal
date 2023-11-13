<?php 

class GScholar_model {
    private $tableGScholar_doc = 'gscholar_documents';
    private $tableGScholar_info = 'gscholar_info';
    private $tableGScholar_summary = 'gscholar_summary';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllShcolarDoc()
    {
        $this->db->query('SELECT gscholar_documents.id,gscholar_documents.title, gscholar_documents.abstract, gscholar_documents.authors, gscholar_documents.journal_name, gscholar_documents.publish_year, gscholar_documents.citation, gscholar_documents.url, gscholar_info.issn, gscholar_info.doi, gscholar_info.kolaborasi_mhs, gscholar_info.koaborasi_non_unikom, gscholar_summary.h_index, gscholar_summary.i10_index 
                          FROM `gscholar_documents`
                          JOIN gscholar_info ON gscholar_documents.id = gscholar_info.id_t_gscholar
                          JOIN gscholar_summary ON gscholar_documents.id_sinta_author = gscholar_summary.id_sinta');
        return $this->db->resultSet();
    }

    // public function getAllWithPagination($params)
    // {
    //     // add default params
    //     $search = isset($params['search']) ? $params['search'] : '';
    //     $limit= isset($params['length']) ? $params['length'] : 10;
    //     $start = isset($params['start']) ? $params['start'] : 0;
    //     $orderColumnIndex = isset($params['order'][0]['column']) ? $params['order'][0]['column'] : "id";
    //     $orderDirection = isset($params['order'][0]['dir']) ? $params['order'][0]['dir'] : 'asc';

    //     $this->db->query("SELECT * FROM `{$this->table}`
    //         WHERE authors LIKE '%{$search}%'
    //         ORDER BY {$orderColumnIndex} {$orderDirection}
    //         LIMIT {$start}, {$limit}
    //     ");
    //     return $this->db->resultSet();
    // }


    // public function getAllWithPagination($limit)
    // {
    //     ## Define columns
    //     $columns = array(
    //         0 => "id",
    //         1 => "id_sinta_author",
    //         2 => "id_document_gscholar",
    //         3 => "title",
    //         4 => "abstract",
    //         5 => "authors",
    //         6 => "journal_name",
    //         7 => "publish_year",
    //         8 => "citation",
    //         9 => "url",
    //     );

    //     ## Request with parameters, define variables
    //     $params = $_REQUEST;
    //     $where = "";
    //     $recordsTotal = $recordsFiltered = 0;

    //     ## Define conditions
    //     if (!empty($params['search']['value'])) {
    //         $where = " WHERE `title` LIKE '%" . $params['search']['value'] . "%' OR `authors` LIKE '%" . $params['search']['value'] . "%'";
    //     }

    //     ## Convert column array to select value
    //     $select = implode("`, `", $columns);

    //     ## Fetch data
    //     $query = "SELECT `" . $select . "` FROM " . $this->table . " " . $where . " ORDER BY " . $columns[$params['order'][0]['column']] . " " . $params['order'][0]['dir'] . " LIMIT " . $params['start'] . "," . $params['length'] . "" ;

    //     $this->db->query($query);
    //     $documentsResult = $this->db->resultSet();

    //     ## If data found, set an array for response
    //     $json_data = array();
    //     if ($documentsResult) {
    //         ## Total count for recordsTotal & recordsFiltered
    //         $this->db->query("SELECT * FROM " . $this->table . $where);
    //         $tot_sql = $this->db->rowCount();
    //         $recordsTotal = $tot_sql;
    //         $recordsFiltered = $tot_sql;

    //         ## Fetch data for response
    //         foreach ($documentsResult as $user_data) {
    //             $data = array();
    //             $data[] = $user_data['id'];
    //             $data[] = $user_data['id_sinta_author'];
    //             $data[] = $user_data['id_document_gscholar'];
    //             $data[] = $user_data['title'];
    //             $data[] = $user_data['abstract'];
    //             $data[] = $user_data['authors'];
    //             $data[] = $user_data['journal_name'];
    //             $data[] = $user_data['publish_year'];
    //             $data[] = $user_data['citation'];
    //             $data[] = $user_data['url'];
    //             $json_data[] = $data;
    //         }
    //     }

    //     return array(
    //         "draw" => intval(12000),
    //         "recordsTotal" => intval($recordsTotal),
    //         "recordsFiltered" => intval($recordsFiltered),
    //         "data" => $json_data
    //     );
    // }


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