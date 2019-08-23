<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/skins/_all-skins.min.css')?>">
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/morris.js/morris.css')?>">
   <!-- jvectormap -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/jvectormap/jquery-jvectormap.css')?>">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
   <link rel="stylesheet" href="../assets/css/datatables.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="../assets/css/custom.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="../assets/js/datatables.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a class="logo" style="background-color: #7dcea0;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Kajur</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Kantin Kejujuran</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" style="background-color: #7dcea0;">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('AdminLTE/dist/img/P.png')?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?PHP echo $_SESSION["username"] ;?></span>
              </a>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="logout" class="fa fa-sign-out btn btn-flat">Keluar</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MANAGEMENT</li>
            <li>
              <a href="jualan">
                <i class="fa fa-pie-chart"></i> <span>Penjualan</span>
              </a>
            </li>
            <li>
              <a href="barangpenjual">
                <i class="fa fa-th"></i> <span>Barang</span>
              </a>
            </li>
			      <li>
              <a href="riwayatsaldotarik">
                <i class="fa fa-book"></i> <span>Riwayat Penarikan</span>
              </a>
            </li>
            <li>
              <a href="riwayatpenjualan">
                <i class="fa fa-book"></i> <span>Riwayat Penjualan</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
