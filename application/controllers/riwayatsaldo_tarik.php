  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class riwayatsaldo_tarik extends REST_Controller  {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    //function untuk menampilkan data pada tabel riwayat penarikan
    function index_get(){
      $id_rp = $this->get('id_rp');
      //inisialisasi agar username sesuai dengan user yang sedang aktif
      $username_pj = $_SESSION["username"];

        if ($id_rp == '') {
            $kotak['rp'] = $this->db->get('r_penarikan')->result();
            $this->db->where('username_pj', $username_pj);
        } else {
            $this->db->where('id_rp', $id_rp);
            $this->db->where('username_pj', $username_pj);
            $kotak['rp'] = $this->db->get('r_penarikan')->result();
        }

        if (empty($id_rp)) {          
            $result = $this->db->get('r_penarikan');
            $num_row = $result->num_rows();
            $result = $result->result_array();
            
            echo json_encode(array('data' => $result, 'rp' => $kotak['rp'] ));
        } else {
            $this->db->where('id_rp', $id_rp);
            $result = $this->db->get('r_penarikan');
            echo json_encode(array('data' => $result->result_array()));
        }
    }
}