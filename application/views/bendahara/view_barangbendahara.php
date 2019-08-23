<?php
$this->load->view('head-bendahara');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>Data Barang</h2>
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
                                <td><b><center>Id Barang</center></b></td>
                                <td><b><center>Nama Barang</center></b></td>
                                <td><b><center>Harga</center></b></td>
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
              <div class="modal-title" style="font-size: 16px;"><strong>Tambah Barang</strong></div>
          </div>
          <div class="modal-body">
            <form id="form">
              <div class="form-group">
                <label class="labelform" for="nama_barang">ID Barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="Masukkan Id Barang">
            </div>
            <div class="form-group">
                <label class="labelform" for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
            </div>
            <div class="form-group">
                <label class="labelform" for="harga_barang">Harga Barang</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="Masukkan Harga Barang">
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
                         <div class="modal-title" style="font-size: 16px;"><strong>Ubah Data Barang</strong></div>
                    </div>
                    <div class="modal-body">
                        <form id="form_ubah">
                            <div class="form-group">
                                <label class="labelform" for="namabarang">ID Barang</label>
                                <input type="text" class="form-control" id="id_barang_ubah" name="id_barang" placeholder="Masukkan ID barang">
                            </div>
                            <div class="form-group">
                                <label class="labelform" for="namabarang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang_ubah" name="nama_barang" placeholder="Masukkan nama barang">
                            </div>
                            <div class="form-group">
                                <label class="labelform" for="harga" style="text-decoration: none;">Harga satuan</label>
                                <input type="number" class="form-control" id="harga_barang_ubah" name="harga_barang" placeholder="Masukkan harga satuan">
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
            url: "<?php echo base_url("barang")?>",
            type: "get", // To protect sensitive data            
            dataType: "JSON",
            success:function(data){
                var res = (data.data);
                $("#tabel > tbody:last").children().remove();
                for(var i in res){

                    var rn = $('<tr class=""></tr>');
                   //first approach to add data (not flexible)
                   rn.append('<td>'+res[i].id_barang+'</td>');
                   rn.append('<td>'+res[i].nama_barang+'</td>');
                   rn.append('<td>'+res[i].harga_barang+'</td>');
                   rn.append('<td>'+res[i].aksi+'</td>');
                    // here add all columns
                    $('#tabel').append(rn);
                }$("#tabel").DataTable();
            }
        });
    };
    
    function validasi() {
        var a = $('#id_barang').val();
        var b = $('#nama_barang').val();
        var c = $('#harga_barang').val();

        function cek(arg) {
            if (arg == '') {return false;}else return true;
        }
        if ((cek(a) && cek(b) && cek(c)) == false) {
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
            url : "<?php echo base_url("barang/index_post"); ?>",
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
            alert("Id sudah digunakan !");
            $('#butSave').text("Simpan");
            $('#butSave').attr('disabled',false); 
        }
    });
		}
    };

    function validasi_ubah() {
        var a = $('#nama_barang_ubah').val();
        var b = $('#harga_barang_ubah').val();

        function cek(arg) {
            if (arg == '') {return false;}else return true;
        }
        if ((cek(a) && cek(b)) == false) {
            return false;
        }else 
        return true;
    };

    function update_data() {
        if (validasi_ubah() == false) {
            alert("Masih ada isian yang kosong!");
        }else{
            $.ajax({
                url : "<?php echo base_url("barang"); ?>",
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

        function detail_data(id_barang) {
            $.ajax({
                url : "<?php echo base_url('barang')?>?id_barang="+id_barang,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    var val = data.data;
                    $('#id_barang_ubah').val(val[0].id_barang).prop('readonly',true);
                    $('#nama_barang_ubah').val(val[0].nama_barang);
                    $('#harga_barang_ubah').val(val[0].harga_barang);
                }
            });
        }
        function edit_barang(id_barang) {
            $('#butSave1').attr("onclick","update_data()");
            $('#myModal_ubah').modal('show');
            // $('.modal-title').text('Ubah Data Barang');
            detail_data(id_barang);
        }

        function reset() {
            $('#id_barang').prop('readonly',false);
            $('#form')[0].reset();
            $('#submit-btn').attr("onclick","tambah_data()");
        }


</script>
</body>
</html>
