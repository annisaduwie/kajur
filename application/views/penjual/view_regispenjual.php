<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kantin Kejujuran</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/AdminLTE.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/iCheck/square/blue.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Kantin Kejujuran</b></a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">DAFTAR PENJUAL</p>

      <form id="form" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="username_pj" name="username_pj" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password_pj" name="password_pj" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="nama_pj" name="nama_pj" placeholder="Nama">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <select class="form-control select2" style="width: 100%;" id="prodi" name="prodi">
            <option value="" disabled selected >Pilih Program studi</option>
            <option value="KOMSI">KOMSI</option>
            <option value="TE">TE</option>
            <option value="METIN">METIN</option>
            <option value="ELINS">ELINS</option>
            <option value="TJ">TJ</option>
            <option value="Lain-lain">Lain-lain...</option>
          </select>
        </div>
        <div class="row" style="margin-top: 30px;" >
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="butSave" onclick="tambah_data()" style="background-color: #00b686; border-color: #00b686">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="row" style="margin-bottom: 10px;" >
      <a href="loginpenjual" class="text-center"><center>Sudah punya akun penjual</center></a>
    </div>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js')?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        reload();
    });
    var myTable;

     function tambah_data() {
        // $('#butSave').text("Menyimpan...");
        $('#butSave').attr('disabled',true);
        $.ajax({
            url : "<?php echo base_url("regispenjual/index_post"); ?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                // to refresh, exactly for datatable integration
                location.reload();
                if (data.status == true) {
                    alert("Akun berhasil dibuat. Silahkan hubungi Bendahara untuk aktifasi akun !");
                    reload();
                    
                    
                   // $('#myModal').modal('hide');
                    $('#form')[0].reset();
                    // $('#butSave').text("Simpan");
                    $('#butSave').attr('disabled',false);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Isian kurang lengkap !");
                // $('#butSave').text("Simpan");
                $('#butSave').attr('disabled',false); 
            }
        });
            
    };
</script>
</body>
</html>
