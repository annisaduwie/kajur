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
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Kantin Kejujuran</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">MASUK SEBAGAI PENJUAL</p>

      <form action="<?=base_url();?>Login/index_get" method="GET">

        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><center><strong> Sukses! </strong> <?=$data;?></center></div>
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
        <div class="alert alert-danger" style="color:red; "><center><strong> Error! </strong> <?=$data2;?></center></div>
        <?php } ?>

        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" id="input_username" placeholder="Masukkan Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="input_password" placeholder="Masukkan Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row" style="margin-top: 30px">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="LoginBendahara" style="background-color: #00b686; border-color: #00b686">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="row" style="margin-bottom: 10px;" >
        <a href="regispenjual" class="text-center" style="margin-bottom: 30px"><center>Daftar Penjual Baru</center></a>
      </div>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js')?>"></script>
  <script type="text/javascript">

function sign_in() {
    var username = $("#input_username").val();
    var password = $("#input_password").val();
        $.ajax({
                url : "<?php echo base_url();?>Login/index_get",
                type: "GET",
                // data: $('#form_login').serialize(),
                dataType: "JSON",
                data: 'username_pj='+username+'&& password_pj='+password,
                success: function(data)
                {
                    // if (data.status == true) {
                    //     $.ajax({
                    //     url : "<?php echo base_url("home/masuk"); ?>",
                    //     });
                    // }else{
                    //     $.ajax({
                    //     url : "<?php echo base_url("home/login"); ?>",
                    //     });
                    // }

                },
        });
    }
    </script>
</body>
</html>
