<?php
    $this->load->view('head-penjual');
?>

<div class="content-wrapper">
        <section class="content-header">
            <h2>Data Barang</h2>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                        <div class="row" style="padding: 15px">
                    </div>
                        
                            <table class="table table-bordered table-hover" id="tabel">
                                <thead>
                                    <tr>
                                        <td><b><center>ID Barang</center></b></td>
                                        <td><b><center>Nama</center></b></td>
                                        <td><b><center>Harga</center></b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
<!-- AdminLTE App -->
<script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('AdminLTE/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        reload();
    });

    function reload() {
        //untuk memanggil tabel barang dari database
        $.ajax({
            url: "<?php echo base_url("barang")?>",
            type: "get", // To protect sensitive data            
            dataType: "JSON",
            success:function(data){
                var res = (data.data);
                $("#tabel > tbody:last").children().remove();
                for(var i in res){
                    
                    var pmb = $('<tr class=""></tr>');
                   //first approach to add data (not flexible)
                    pmb.append('<td>'+res[i].id_barang+'</td>');
                    pmb.append('<td>'+res[i].nama_barang+'</td>');
                    pmb.append('<td>'+res[i].harga_barang+'</td>'); 
                    // here add all columns
                    $('#tabel').append(pmb);
               }
               //implementasi datatabel
               $("#tabel").DataTable();
            }
        });
    };
    
      function delete_id(id) {
        if(confirm('Apakah yakin menghapus data ini ?')){
            // ajax delete data to database

            $.ajax({
                url : "<?php echo base_url('barang')?>/"+ id,
                type: "DELETE",
                dataType: "JSON",
                success: function(data)
                {
                    // to refresh, exactly for datatable integration
                    location.reload();
                    //if success reload ajax table
                    if (data.status == true) {
                        alert("Data berhasil di hapus");
                        reload();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error menghapus data');
                }
            });
     
        }
    }
</script>
</body>
</html>
