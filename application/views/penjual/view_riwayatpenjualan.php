<?php
$this->load->view('head-penjual');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>Riwayat Penjualan</h2>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Tabel riwayat penambahan saldo -->
                    <table class="table table-bordered table-hover" id="tabel">
                            <thead>
                                <tr>
                                    <th>Id_Kotak</th>
                                    <th>Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah stok</th>
                                    <th>Terjual</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
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
        //untuk menampilkan data pada tabel riwayat penjualan
        $.ajax({
            url: "<?php echo base_url("riwayat_penjualan/index_get")?>",
            type: "get", // To protect sensitive data            
            dataType: "JSON",
            success:function(data){
                var x = (data.data);
                var brg = (data.brg);

                $("#tabel > tbody:last").children().remove();
                for(var i in x){
                    var ktk = $('<tr class=""></tr>');

                    ktk.append('<td>'+x[i].id_kotak+'</td>');

                    for (var a in brg){
                        if (x[i].id_barang == brg[a].id_barang)
                            ktk.append('<td>'+brg[a].nama_barang+'</td>');
                    }

                    for (var a in brg){
                        if (x[i].id_barang == brg[a].id_barang)
                            ktk.append('<td>'+brg[a].harga_barang+'</td>');
                    }

                    ktk.append('<td>'+x[i].jml_brg+'</td>');
                    ktk.append('<td>'+x[i].terjual+'</td>');
                    ktk.append('<td>'+x[i].status_kt+'</td>');
                    $('#tabel').append(ktk);
                }
                $("#tabel").DataTable();
                
            }
        });
    }
;</script>
</body>
</html>
