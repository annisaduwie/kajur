<?php
$this->load->view('head-bendahara');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>Data Penjual</h2>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row" style="padding: 15px">
              <div class ="col-md-12" style="text-align:right ;padding-right: 15px; padding-bottom: 15px;">
                <button type="button" style="background-color:#00b686; color:#fff;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah</button>
              </div>
            </div>

            <table class="table table-bordered table-striped" id="tabel">
              <thead>
                <tr>
                  <td><b><center>Username</center></b></td>
                  <td><b><center>Nama</center></b></td>
                  <td><b><center>Prodi</center></b></td>
                  <td><b><center>Status</center></b></td>
                  <td><b><center>Saldo</center></b></td>
                  <td><b><center></center></b></td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" style="vertical-align: center">
      <div class="modal-dialog" style="text-align: center;">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-title" style="font-size: 16px;"><strong>Tambah Penjual</strong></div>
          </div>
          <div class="modal-body">
            <form id="form">
              <div class="form-group">
                <label class="labelform" for="username">Username</label>
                <input type="text" class="form-control" id="username_pj" name="username_pj" placeholder="Masukkan Username">
              </div>
              <div class="form-group">
                <label class="labelform" for="nama_barang">Nama</label>
                <input type="text" class="form-control" id="nama_pj" name="nama_pj" placeholder="Masukkan Nama">
              </div>
              <div class="form-group">
                <label class="labelform" for="prodi">Prodi</label>
                <select class="form-control select2" id="prodi" name="prodi" style="width: 100%;" >
                  <option value="" disabled selected >Pilih Program studi</option>
                  <option >KOMSI</option>
                  <option >TE</option>
                  <option >METIN</option>
                  <option >ELINS</option>
                  <option >TJ</option>
                  <option >Lain-lain...</option>
                </select>
              </div>
              <div class="form-group">
                <label class="labelform" for="status_pj">Status</label>
                <input type="text" class="form-control" id="status_pj" name="status_pj" value="Aktif" disabled>
              </div>
              <div class="form-group">
                <label class="labelform" for="saldo">Saldo Awal (min. 20.000)</label>
                <input type="number" class="form-control" id="saldo" name="saldo" placeholder="Masukkan saldo">
              </div>
              <div class="form-group">
                <label class="labelform" for="harga_barang">Password</label>
                <input type="password" class="form-control" id="password_pj" name="password_pj" placeholder="Masukkan password">
              </div>
            </form>    
          </div>
          <div class="modal-footer">
            <button type="button" onclick="tambah_data()" id="butSave" class="btn btn-info" style="background-color:#00b686; color:#fff;">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style= "background-color:#fff; color:grey; border: solid 0.5px grey">Batal</button>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade" id="myModal_ubah" role="dialog" style="vertical-align: center">
      <div class="modal-dialog" style="text-align: center;">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-title2" style="font-size: 16px;"><strong>Ubah Data Penjual</strong></div>
          </div>
          <div class="modal-body">
            <form id="form_ubah">
              <div class="form-group">
                <label class="labelform" for="namabarang">Username</label>
                <input type="text" class="form-control" id="username_pj_ubah" name="username_pj" placeholder="Masukkan ID barang">
              </div>
              <div class="form-group">
                <label class="labelform" for="status_pj">Status</label>
                <input type="text" class="form-control" id="status_pj_ubah" name="status_pj" value="Aktif" disabled>
              </div>
              <div class="form-group">
                <label class="labelform" for="saldo">Saldo Awal (min. 20.000)</label>
                <input type="number" class="form-control" id="saldo_ubah" name="saldo" placeholder="Masukkan saldo">
              </div>
            </form>    
          </div>
          <div class="modal-footer">
            <button type="button" onclick="update_data()" id="butSave1" class="btn btn-info" style="background-color:#00b686; color:#fff;">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style= "background-color:#fff; color:grey; border: solid 0.5px grey">Batal</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

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
<!-- DataTables -->
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('AdminLTE/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    reload();
  });

  function reload() {
    $.ajax({
      url: "<?php echo base_url("penjual")?>",
            type: "get", // To protect sensitive data            
            dataType: "JSON",
            success:function(data){
              var res = (data.data);
              $("#tabel > tbody:last").children().remove();
              for(var i in res){

               var pnj = $('<tr class=""></tr>');
                   //first approach to add data (not flexible)
                   pnj.append('<td>'+res[i].username_pj+'</td>');
                   pnj.append('<td>'+res[i].nama_pj+'</td>');
                   pnj.append('<td>'+res[i].prodi+'</td>');
                   pnj.append('<td>'+res[i].status_pj+'</td>');
                   pnj.append('<td>'+res[i].saldo+'</td>');
                   pnj.append('<td>'+res[i].aksi+'</td>');
                    // here add all columns
                    $('#tabel').append(pnj);
                  }$("#tabel").DataTable();
                }
              });
  };

  function validasi() {
    var a = $('#username_pj').val();
    var b = $('#password_pj').val();
    var c = $('#nama_pj').val();
    var d = $('#prodi').val();
    var e = $('#saldo').val();
    var f = $('#status_pj').val();

    function cek(arg) {
      if (arg == '') {return false;}else return true;
    }
    if ((cek(a) && cek(b) && cek(c) && cek(d) && cek(e))== false) {
      return false;
    }else 
    return true;
  };

  function tambah_data() {
    if (validasi() == false) {
      alert("Masih ada inputan kosong!");
    }else{
      $('#butSave').text("Menyimpan...");
      $('#butSave').attr('disabled',true);
      $.ajax({
        url : "<?php echo base_url("penjual"); ?>",
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
                // to refresh, exactly for datatable integration
                location.reload();
                if (data.status == true) {
                  reload();
                  alert("Data berhasil ditambahkan !");
                   $('#myModal').modal('hide');
                   $('#form')[0].reset();
                   $('#butSave').text("Simpan");
                   $('#butSave').attr('disabled',false);
                 }
               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                alert("Username sudah digunakan !");
                $('#butSave').text("Simpan");
                $('#butSave').attr('disabled',false); 
              }
            });
    }
  };

  function detail_data(username_pj) {
    $.ajax({
      url : "<?php echo base_url('penjual')?>?username_pj="+username_pj,
      type: "GET",
      dataType: "JSON",
      success: function(data){
        var val = data.data;
        $('#username_pj_ubah').val(val[0].username_pj).prop('readonly',true);
        //$('#status_pj_ubah').val(val[0].status_pj);
        $('#saldo_ubah').val(val[0].saldo);
      }
    });
  }

  function edit_data(username_pj) {
    $('#butSave1').attr("onclick","update_data()");
    $('#myModal_ubah').modal('show');
    // $('.modal-title2').text('Ubah Data Penjual');
    detail_data(username_pj);
  }

  function validasi_ubah() {
    var a = $('#saldo_ubah').val();

    function cek(arg) {
      if (arg == '') {return false;}else return true;
    }
    if (cek(a)== false) {
      return false;
    }else 
    return true;
  };

  function update_data() {
    if (validasi_ubah() == false) {
      alert("Form jumlah saldo masih kosong !");
    }else{
      $.ajax({
        url : "<?php echo base_url("penjual"); ?>",
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
  function reset() {
    $('#username_pj').prop('readonly',false);
    $('#form')[0].reset();
    $('#butSave').attr("onclick","tambah_data()");
  }
</script>
</body>
</html>
