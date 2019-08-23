
  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class riwayatsaldo_pembeli extends REST_Controller  {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get(){
      $id_rs = $this->get('id_rs');
        if (empty($id_rs)) {          
            $result = $this->db->get('r_saldo');
            $num_row = $result->num_rows();
            $result = $result->result_array();
            
            echo json_encode(array('data' => $result ));
        } else {
            $this->db->where('id_rs', $id_rs);
            $result = $this->db->get('r_saldo');
            echo json_encode(array('data' => $result->result_array()));
        }
        
    }

        function index_post() {
        $id = $this->post('username_pb');
        $jml_saldo=$this->db->query("SELECT jml_s FROM r_saldo WHERE username_pb = '$id' ORDER BY waktu_s DESC LIMIT 1 ")->row_array();

        $nominal = $this->post('nominal_s');
        $saldo = $jml_saldo['jml_s']+$this->post('nominal_s');

        $data = array(
            'username_pb'   => $this->post('username_pb'),
            'nominal_s'   => $this->post('nominal_s'),
            'jml_s'   => $saldo);
        $insert = $this->db->insert('r_saldo', $data);

        $this->db->where("username_pb",$this->post('username_pb'));
        $this->db->update("pembeli", array("status_pb" => "Aktif"));

        if ($insert) {
            echo json_encode(array('status' => True ));
        }

        //$saldo_p=$this->db->query("SELECT saldo FROM pembeli WHERE username_pb = $id ORDER BY waktu_s DESC LIMIT 1 ")->row_array();
        //$saldo_tambah = $saldo_p['saldo']+$this->post('nominal_s');
        //$data1 = array(
        //    'saldo' => $saldo);
        $this->db->where("username_pb",$this->post('username_pb'));
        $this->db->update("pembeli", array("saldo" => $saldo));
        //$masuk = $this->db->update('pembeli', $data1);

    }
}