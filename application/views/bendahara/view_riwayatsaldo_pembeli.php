<?php
$this->load->view('head-bendahara');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>Riwayat Saldo Pembeli</h2>
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
                                <td><b><center>Id</center></b></td>
                                <td><b><center>Username</center></b></td>
                                <td><b><center>Waktu</center></b></td>
                                <td><b><center>Nominal</center></b></td>
                                <td><b><center>Jumlah</center></b></td>
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
              <div class="modal-title" style="font-size: 16px;"><strong>Riwayat Saldo</strong></div>
          </div>
          <div class="modal-body">
            <form id="form">
              <div class="form-group">
                <label class="labelform" for="username_pb">Username Pembeli</label>
                <select id="username_pb" name="username_pb" class="form-control" required>
                    <option value="" disabled selected><i>---Pilih Username---</i></option>
                    <?php $dataPembeli=$this->db->query("SELECT username_pb FROM pembeli")->result();

                    foreach ($dataPembeli as $d)  { ?>
                    <option value="<?php echo $d->username_pb;?>"><?php echo $d->username_pb;?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="form-group">
                <label class="labelform" for="nominal_s">Nominal</label>
                <input type="number" class="form-control" id="nominal_s" name="nominal_s" placeholder="Masukkan Nominal">
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
            url: "<?php echo base_url("riwayatsaldo_pembeli")?>",
            type: "get", // To protect sensitive data            
            dataType: "JSON",
            success:function(data){
                var res = (data.data);
                $("#tabel > tbody:last").children().remove();
                for(var i in res){

                    var pmb = $('<tr class=""></tr>');
                   //first approach to add data (not flexible)
                   pmb.append('<td>'+res[i].id_rs+'</td>');
                   pmb.append('<td>'+res[i].username_pb+'</td>');
                   pmb.append('<td>'+res[i].waktu_s+'</td>');
                   pmb.append('<td>'+res[i].nominal_s+'</td>');
                   pmb.append('<td>'+res[i].jml_s+'</td>');
                    // here add all columns
                    $('#tabel').append(pmb);
                }$("#tabel").DataTable();
            }
        });
    };

    function validasi() {
        var a = $('#usename_pb').val();
        var b = $('#nominal_s').val();
        function cek(arg) {
            if (arg == '') {return false;}else return true;
        }
        if ((cek(a) && cek(b)) == false) {
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
                url : "<?php echo base_url("riwayatsaldo_pembeli/index_post"); ?>",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                // to refresh, exactly for datatable integration
                location.reload();
                if (data.status == true) {
                    alert("Data berhasil ditambahkan !");
                    reload();
                    
                   // $('#myModal').modal('hide');
                   $('#form')[0].reset();
                   $('#butSave').text("Simpan");
                   $('#butSave').attr('disabled',false);
               }
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
                alert("Data gagal ditambahkan !");
                $('#butSave').text("Simpan");
                $('#butSave').attr('disabled',false); 
            }
        });
        }  
    };
</script>
</body>
</html>
