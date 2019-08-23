  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  require APPPATH . '/libraries/REST_Controller.php';

  class riwayatpenarikan_penjual extends REST_Controller  {

      function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get()
    {
      $id_rp = $this->get('id_rp');
      if (empty($id_rp)) {          
        $result = $this->db->get('r_penarikan');
        $num_row = $result->num_rows();
        $result = $result->result_array();

        for ($i=0; $i < $num_row ; $i++) { 
            $result[$i] += array(
                "aksi" => '<center><button type="button"  onclick="edit(\''.$result[$i]['id_rp'].'\')" class="btn btn-info">Edit</button> <button type="button" onclick="delete_id(\''.$result[$i]['id_rp'].'\')" class="btn btn-danger">Hapus</button></center>'
            );                
        }
        echo json_encode(array('data' => $result ));
    } else {
        $this->db->where('id_rp', $id_rp);
        $result = $this->db->get('r_penarikan');
        echo json_encode(array('data' => $result->result_array()));
    }

}

function index_post() {


        //select saldo dari penjual
    $id = $this->post('username_pj');
    $saldosekarang = $this->db->query("SELECT saldo FROM penjual WHERE username_pj = '$id'")->row_array();

        //pengurangan saldo saat ini dengan nominal panrikan
    $nominal = $this->post('nominal_p');


        //cek jumlah saldo yang dimiliki
    if ($saldosekarang['saldo'] < $nominal) {
        alert('Saldo tidak mencukupi');
    } else {
        $saldo = $saldosekarang['saldo']-$this->post('nominal_p');
        
        //insert database
        $data = array(
            'id_rp'           => $this->post('id_rp'),
            'username_pj'     => $this->post('username_pj'),
            'waktu_p'         => $this->post('waktu_p'), 
            'nominal_p'       => $this->post('nominal_p'),
            'sisa_saldo'      => $saldo);
        $insert = $this->db->insert('r_penarikan', $data);
        if ($insert) {
            echo json_encode(array('status' =>True));
        }
        

        //update saldo di penjual
        $this->db->where("username_pj",$this->post('username_pj'));
        $this->db->update("penjual", array("saldo" => $saldo));
    }
}
}