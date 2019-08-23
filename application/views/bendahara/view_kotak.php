
<?php
$this->load->view('head-bendahara');
?>

<div class="content-wrapper">
  <section class="content-header" style="text-align: left;">
    <h2>Kotak</h2>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header" style="text-align: right;">
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover" id="tabel">
              <thead>
                <tr>
                  <th>ID Kotak</th>
                  <th>Penjual</th>
                  <th>Nama Barang</th>
                  <th>Harga Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Terjual</th>
                  <th>Waktu</th>
                  <th>Status Kotak</th> 
                  <th></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal_ubah" role="dialog" style="vertical-align: center">
      <div class="modal-dialog" style="text-align: center;">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-title" style="font-size: 16px;"><strong>Ubah Data Barang</strong></div>
          </div>
          <div class="modal-body">
            <form id="form_ubah">
              <div class="form-group">
                <label class="labelform" for="id_kotak">ID Kotak</label>
                <input type="text" class="form-control" id="id_kotak_ubah" name="id_kotak" placeholder="Masukkan ID Kotak">
              </div>
              <div class="form-group">
                <label class="labelform"  for="status" style="text-decoration: none;">Status</label>
                <select class="form-control" id="status_kt_ubah" name="status_kt" required>
                  <option>Aktif</option>
                  <option>Tidak Aktif</option>
                </select>
              </div>
              <div class="form-group">
                <label class="labelform" for="jml_barang" style="text-decoration: none;">Jumlah Barang</label>
                <input type="text" class="form-control" id="jml_brg_ubah" name="jml_brg" placeholder="Masukkan jumlah barang">
              </div>
            </form>    
          </div>
          <div class="modal-footer">
            <button type="button" onclick="update_data()" id="butSave" class="btn btn-info" style="background-color:#00b686; color:#fff;">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style= "background-color:#fff; color:grey; border: solid 0.5px grey">Batal</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    reload();
  });

  function reload() {
    $.ajax({
      url: "<?php echo base_url("kotak")?>",
                type: "get", // To protect sensitive data            
                dataType: "JSON",
                success:function(data){
                  var res = (data.data);
                  var brg = (data.brg);

                  $("#tabel > tbody:last").children().remove();
                  for(var i in res){
                    var rn = $('<tr class=""></tr>');
                    rn.append('<td>'+res[i].id_kotak+'</td>');
                    rn.append('<td>'+res[i].username_pj+'</td>');

                    for (var a in brg){
                      if (res[i].id_barang == brg[a].id_barang)
                        rn.append('<td>'+brg[a].nama_barang+'</td>');
                    }

                    for (var a in brg){
                      if (res[i].id_barang == brg[a].id_barang)
                        rn.append('<td>'+brg[a].harga_barang+'</td>');
                    }

                    rn.append('<td>'+res[i].jml_brg+'</td>');
                    rn.append('<td>'+res[i].terjual+'</td>');
                    rn.append('<td>'+res[i].waktu_k+'</td>');
                    rn.append('<td>'+res[i].status_kt+'</td>');
                    rn.append('<td>'+res[i].aksi+'</td>');
                    $('#tabel').append(rn);
                  }$('#tabel').DataTable();
                }
              });
  };

  function validasi() {
        var a = $('#jml_brg_ubah').val();
        
        function cek(arg) {
            if (arg == '') {return false;}else return true;
        }
        if ((cek(a))== false) {
            return false;
        }else 
        return true;
    };

  function update_data() {
    if (validasi() == false) {
            alert("Jumlah barang masih kosong!");
        }else{
    $.ajax({
      url : "<?php echo base_url("kotak"); ?>",
      type: "PUT",
      data: $('#form_ubah').serialize(),
      dataType: "JSON",
      success: function(data)
      {
        if (data.status == true) {
          reload();
          alert("Perubahan telah disimpan.");
          $('#myModal_ubah').modal('hide');
          reset();
        }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert(errorThrown);
      }
    });
    }
  }

  function detail_data(id_kotak) {
    $.ajax({
      url : "<?php echo base_url('kotak')?>?id_kotak="+id_kotak,
      type: "GET",
      dataType: "JSON",
      success: function(data){
        var val = data.data;
        $('#id_kotak_ubah').val(val[0].id_kotak).prop('readonly',true);
        $('#jml_brg_ubah').val(val[0].jml_brg);
        $('#status_kt_ubah').val(val[0].status_kt);
      }
    });
  }
  function edit_kotak(id_kotak) {
    $('#butSave').attr("onclick","update_data()");
    $('#myModal_ubah').modal('show');
    $('.modal-title').text('Ubah Data Kotak');
    detail_data(id_kotak);
  }

  function reset() {
    $('#id_barang').prop('readonly',false);
    $('#form')[0].reset();
    $('#submit-btn').attr("onclick","add_data()");
  }

      </script>

      <!-- jQuery 3 -->
      <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo base_url('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
      <!-- Morris.js charts -->
      <script src="<?php echo base_url('AdminLTE/bower_components/raphael/raphael.min.js')?>"></script>
      <script src="<?php echo base_url('AdminLTE/bower_components/morris.js/morris.min.js')?>"></script>
      <!-- Sparkline -->
      <script src="<?php echo base_url('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
      <script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url('AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url('AdminLTE/bower_components/moment/min/moment.min.js')?>"></script>
      <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
      <!-- datepicker -->
      <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo base_url('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?php echo base_url('AdminLTE/dist/js/pages/dashboard.js')?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
      <!-- DataTables -->
      <script src="<?php echo base_url('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
      <script src="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    </body>
    </html>
