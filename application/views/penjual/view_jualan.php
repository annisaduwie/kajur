
<style type="text/css">
.saldo{
    text-align: center;
    border: 1px solid;
    border-radius: 20px;
    border-color: #7dcea0;
    color: #7dcea0;
    width: 200px;
    font-size: 18px;
}
</style>
<?php
    $this->load->view('head-penjual');  //head penjual
    ?>

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-12">
                            <center>
                                <h2>Penjualan</h2>

                                <div class="saldo">
                                    Saldo <?php 
                                    $pb=$_SESSION["username"];
                                    $saldopb=$this->db->query("SELECT saldo FROM penjual where username_pj='$pb'")->result();

                                    foreach ($saldopb as $s)  { 
                                        echo $s->saldo;
                                    } ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tambah Barang
                                </div>
                                <!--    Hover Rows  -->
                                <div class="panel-body">
                                    <form class="form-horizontal" id="data" method="POST">
                                        <div class="box-body">

                                            <input type="hidden" name="username_pj" id="username_pj" value="<?PHP echo $_SESSION["username"] ;?>">


                                            <div class="form-group">
                                              <label for="inputPassword3" class="col-sm-3 control-label">Nama Barang</label>

                                              <div class="col-sm-9">
                                                <select id="id_barang" name="id_barang" class="form-control select2" required>
                                                  <option value="" disabled selected>
                                                    <i>---Pilih Barang---</i>
                                                </option>
                                                <?php $dataBarang=$this->db->query("SELECT id_barang, nama_barang FROM barang")->result();

                                                foreach ($dataBarang as $d)  { ?>
                                                <option value="<?php echo $d->id_barang;?>">
                                                    <?php echo $d->nama_barang;?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Jumlah Stok</label>

                                        <div class="col-sm-9">
                                            <input type="number" name="jml_brg"  class="form-control" id="jml_brg" placeholder="Masukkan jumlah barang" />
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" onclick="tambah_data()" class="btn btn-info pull-right"style="background-color:#00b686; color:#fff; border: none;">Tambah</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Etalase hari ini
                        </div>
                        <!--    Hover Rows  -->
                        <div class="panel-body">
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
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</section>
</div>
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
        //untuk memanggil tabel kotak dari database
        $.ajax({
            url: "<?php echo base_url("jualan/index_get")?>",
            type: "get", // To protect sensitive data            
            dataType: "JSON",
            success:function(data){
                var x = (data.data);

                $("#tabel > tbody:last").children().remove();
                for(var i in x){
                    var ktk = $('<tr class=""></tr>');

                    ktk.append('<td>'+x[i].id_kotak+'</td>');
                    ktk.append('<td>'+x[i].nama_barang+'</td>');
                    ktk.append('<td>'+x[i].harga_barang+'</td>');
                    ktk.append('<td>'+x[i].jml_brg+'</td>');
                    ktk.append('<td>'+x[i].terjual+'</td>');
                    ktk.append('<td>'+x[i].status_kt+'</td>');
                    $('#tabel').append(ktk);
                }
                 //implementasi datatabel
                $("#tabel").DataTable();
            }
        });
    };

    //function untuk validasi ketika masih ada kolom yang kosong
    //atau belum diisi
    function validasi() {
        var a = $('#jml_brg').val();

        function cek(arg) {
          if (arg == '') {return false;}else return true;
        }
        if ((cek(a))== false) {
            return false;
        }else 
        return true;
    };

  //function untuk tambah data kotak penjualan
  function tambah_data() {
    //if untuk melakukan pengecekan apakah masih
    //ada kolom yang kosong
    if (validasi() == false) {
      alert("Masih ada inputan kosong!");
    }else{
    $('#butSave').text("Menyimpan...");
    $('#butSave').attr('disabled',true);
    //untuk menambah data pada tabel kotak dari database
    $.ajax({
        url : "<?php echo base_url('jualan/index_post'); ?>",
        type: "POST",
        data: $('#data').serialize(),
        dataType: "JSON",
        success: function(data)
        {
                // to refresh, exactly for datatable integration
                
                if (data.status == true) {
                    alert("Data berhasil ditambahkan !");
                    reload();
                    
                    $('#myModal').modal('hide');
                    $('#form')[0].reset();
                    $('#butSave').text("Simpan");
                    $('#butSave').attr('disabled',false);
                    location.reload();
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                // alert("Data gagal ditambahkan !");
                $('#butSave').text("Simpan");
                $('#butSave').attr('disabled',false); 
            }
        });
    }
};
</script>
</body>
</html>