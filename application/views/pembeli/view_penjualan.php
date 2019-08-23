<!DOCTYPE html>
<html>
    <style type="text/css">
.hargapembelian{
    text-align: center;
    border: 1px solid;
    border-radius: 20px;
    border-color: #7dcea0;
    color: #7dcea0;
    width: 200px;
    font-size: 18px;
}
.bar {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
    text-transform: lowercase;
}
.bar > li {
    position: relative;
    display: block;
}
.bar > li > a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
.bar > li > a:hover,
.bar > li > a:focus {
    text-decoration: none;
    background-color: #00b686;
}
.saldo{
    text-align: center;
    border: 1px solid;
    border-radius: 20px;
    border-color: #7dcea0;
    color: #7dcea0;
    width: 200px;
    font-size: 18px;
}
.modal-body{
    border: 1px solid;
    border-color: #e0e0e0;
    border-radius: 3px;
}
.input1{
    width: 400px;
    margin-bottom: 10px;
    padding-left: 10px;
    margin-top: 10px;
}
.label1{
    text-align: left;
    color: #000000;
}
</style>
    <?php
    $this->load->view('head-pembelian');  
?>
    <section>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <center>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Pembelian</h2>
                              <div class="hargapembelian">
                                    Total Harga <?php 
                                            $hargatr=$this->db->query("SELECT SUM(p.harga_pb) AS jml FROM penjualan p, transaksi t WHERE 
                                            t.id_transaksi=p.id_transaksi AND t.id_transaksi IN(SELECT max(id_transaksi) FROM transaksi)")->result();
                                            foreach ($hargatr as $h)  { 
                                                echo $h->jml;
                                            } ?>
                                </div>
                        </div>
                    </div>
                </center>
            </div>
            <br>
                <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                            Tambah Barang
                        </div>
                                    <!--    Hover Rows  -->
                                    <div class="panel-body">
                                        <form id="data" method="POST">
                                            <table >
                                                <tr>
                                                    <td style="padding-right: 15px">Barcode</td>
                                                    <td>
                                                        <select id="id_kotak" name="id_kotak" class="form-control" required>
                                                            <option value="" disabled selected>
                                                                <i>---Pilih Barang---</i>
                                                            </option>
                                                            <?php $dataKotak=$this->db->query("SELECT DISTINCT id_kotak, nama_barang FROM kotak, barang WHERE barang.id_barang = kotak.id_barang AND status_kt = 'Aktif' AND jml_brg > 0 ")->result();
                               
                                            foreach ($dataKotak as $d)  { ?>
                                                            <option value="<?php echo $d->id_kotak;?>">
                                                                <?php echo $d->id_kotak;?>
                                                                <?php echo $d->nama_barang;?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-right: 15px">Jumlah Barang</td>
                                                        <td>
                                                            <input type="number" name="jml_pb"  class="input1" id="jml_pb" placeholder="Masukkan jumlah barang" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-info" onclick="tambah_data()" style="background-color:#00b686; color:#fff; border: none;">Tambah</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                            Data Pembelian
                        </div>
                                        <!--    Hover Rows  -->
                                        <div class="panel-body">
                                            <table class="table table-hover" id="tabel">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Harga Total</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                            <tr>
                                                        <td>
                                                            <form id="data1">
                                                                <a href="<?php echo base_url('Awal'); ?>">
                                                            <button type="button" id="btnedit-btn" class="btn btn-info" onclick="update_data()" style="background-color:#00b686; color:#fff; border: none;">Beli</button>
                                                        </a>
                                                        </form>
                                                        </td>
                                                    </tr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- <footer  style="background-color: #7dcea0;"><div class="container"><div class="row"><div class="col-md-12">
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a></div></div></div></footer> -->
                <!-- FOOTER SECTION END-->
                <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
                <!-- CORE JQUERY SCRIPTS -->
                <script src="
                    <?PHP echo base_url('assets/js/jquery-1.11.1.js')?>">
                </script>
                <!-- BOOTSTRAP SCRIPTS  -->
                <script src="
                    <?PHP echo base_url('assets/js/bootstrap.js')?>">
                </script>
            </body>
            <script type="text/javascript">
    $(document).ready(function(){
        reload();
    });

function reload() {
        $.ajax({
            url: "<?php echo base_url("penjualan/index_get")?>",
            type: "get", // To protect sensitive data            
            dataType: "JSON",
            success:function(data){
                var x = (data.data);

                $("#tabel > tbody:last").children().remove();
                for(var i in x){
                    var penj = $('<tr class=""></tr>');
                   
                    penj.append('<td>'+x[i].nama_barang+'</td>');
                    penj.append('<td>'+x[i].jml_pb+'</td>');
                    penj.append('<td>'+x[i].harga_barang+'</td>');
                    penj.append('<td>'+x[i].harga_pb+'</td>');
                    penj.append('<td>'+x[i].aksi+'</td>');
                    $('#tabel').append(penj);
               }
                
            }
        });
    };

function tambah_data() {
        $('#butSave').text("Menyimpan...");
        $('#butSave').attr('disabled',true);
        $.ajax({
            url : "<?php echo base_url('penjualan/index_post'); ?>",
            type: "POST",
            data: $('#data').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                // to refresh, exactly for datatable integration
                location.reload();
                if (data.status == true) {
                    alert("Data berhasil ditambahkan !");
                    reload();
                    
                    //$('#myModal').modal('hide');
                    $('#form')[0].reset();
                    $('#butSave').text("Simpan");
                    $('#butSave').attr('disabled',false);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Stok yang tersedia tidak mencukupi");
                $('#butSave').text("Simpan");
                $('#butSave').attr('disabled',false); 
            }
        });
            
    };

        function update_data() {
        $.ajax({
            url : "<?php echo base_url("penjualan/index_put"); ?>",
            type: "PUT",
            data: $('#data1').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if (data.status == true) {
                    reload();
                    //alert("Data berhasil diubah !");
                    $('#myModaledit').modal('hide');
                    $('#removeID').append();
                    reset();
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert(errorThrown);
            }
        });
    }

        function delete_penjualan(id_penjualan) {
        if(confirm('Apakah yakin menghapus data ini ?')){
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url('penjualan')?>/"+ id_penjualan,
                type: "DELETE",
                dataType: "JSON",
                success: function(data)
                {
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
        </html>
