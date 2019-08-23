<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
    .tombol {
        border-color: #00b686;
        color:#00b686;
        margin: 20px;
        border-radius: 5px;
        background-color: #fff;
        width: 200px;
    }
    
</style>
<head>
    <title>Kantin Kejujuran</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>KAJUR</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div style="padding-top: 40px; font-size: 40px; padding-bottom: 20px; color: #7dcea0">
        <Center>KANTIN KEJUJURAN</Center>
    </div>
    
    <div class="content-wrapper">
    	<div class="container">
    		<div class="row" >    			
    			<center>
    				<table>
    					<tr > 
    					<td align="center" style="padding-left: 50px;padding-right: 50px"><img src="<?php echo base_url('assets/images/bendahara.png')?>" rel="stylesheet"  height="250px"> 
    						<br><b>Bendahara.</b></n>
    						<br>Masuk khusus Bendahara</p>
    						<br><a href="Awal/loginbendahara"><button class= "tombol" >MASUK BENDAHARA</button></a></td>
    					<td align="center" style="padding-left: 50px;padding-right: 50px"><img src="<?php echo base_url('assets/images/penjual.png')?>" rel="stylesheet" height="250px"> 
    						<br><b>Mulai bisnismu sendiri.</b>
    						<br>Masuk sebagai Penjual <br>untuk mulai berjualan di Kantin Kejujuran
    						<br><a href="Awal/loginpenjual"><button href="Home/loginpenjual" class= "tombol">MASUK PENJUAL</button></a></td>
    					<td align="center" style="padding-left: 50px;padding-right: 50px"><img 
    						src="<?php echo base_url('assets/images/beli.png')?>" rel="stylesheet" height="250px">
    						<br><b>Beli tanpa akun.</b>
    						<br>Belum punya akun pembeli?<br>Silahkan beli disini
    						<br><a href="<?php echo base_url('Awal/penjualan'); ?>"><button onclick="tambah_data()" id="butSave" class="tombol">BELI</button></a></td>
    					</tr>
    				</table>
    			</center> 
    		</div>
    	</div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.js')?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
        reload();
    });
    var myTable;

     function tambah_data() {
        $('#butSave');
        $('#butSave');
        $.ajax({
            url : "<?php echo base_url("transaksi/index_post"); ?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            // success: function(data)
            // {
            //     // to refresh, exactly for datatable integration
            //     location.reload();
            //     if (data.status == true) {
            //         reload();
                    
            //        // $('#myModal').modal('hide');
            //         $('#form')[0].reset();
            //         $('#butSave').text("Simpan");
            //         $('#butSave').attr('disabled',false);
            //     }
            // },
            // error: function (jqXHR, textStatus, errorThrown)
            // {
            //     $('#butSave');
            //     $('#butSave'); 
            // }
        });
            
    };
    </script>
</html>
