<?php
$this->load->view('head-bendahara');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <!-- Donut chart -->
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Penjual</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="donut-chart" style="height: 400px;"></div>
            </div>


           
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Saldo Penjual</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
               <canvas id="myChart" width="100" height="100"></canvas>
        </div>
            </div>
            <!-- /.box-body -->
            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Barang Terjual</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
               <canvas id="myChart2" width="100" height="100"></canvas>
        </div>
            </div>





          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>








<!-- ./wrapper -->
<?php


                $conn = new mysqli('localhost', 'root', '', 'kajur');
                $userPenjual = mysqli_query($conn, "SELECT distinct username_pj FROM penjual WHERE status_pj ='Aktif' Group by username_pj");
                $saldo = mysqli_query($conn, "SELECT saldo FROM penjual WHERE status_pj ='Aktif' Group by username_pj ");

                $namaBarang = mysqli_query($conn, "SELECT nama_barang FROM kotak, barang where kotak.id_barang = barang.id_barang GROUP by barang.nama_barang");
                 $barangTerjual = mysqli_query($conn, "SELECT SUM(k.terjual) AS terjual FROM barang b, kotak k WHERE k.id_barang = b.id_barang GROUP BY b.nama_barang");

                $aktif = $conn->query("select * FROM penjual where status_pj='Aktif'");
                $nonaktif = $conn->query("select * FROM penjual where status_pj='Belum Aktif'");

                //  $terjualbarang1 = $conn->query("select SUM(terjual) FROM  kotak  WHERE MONTH(waktu_k) = 01 AND kotak.status_kt='Aktif'");
                //   $jumlahKotak1 = $conn->query("select * FROM  kotak  WHERE MONTH(waktu_k) = 01 AND kotak.status_kt='Aktif'");

                //  $terjualbarang2 = $conn->query("select terjual FROM  kotak  WHERE MONTH(waktu_k) = 02 AND kotak.status_kt='Aktif'");

    
                //  $terjualbarang3 = $conn->query("select terjual FROM  kotak  WHERE MONTH(waktu_k) = 03 AND kotak.status_kt='Aktif'");




                //  // $namaPenjual = $conn->query("SELECT username_pj FROM kotak  WHERE AND kotak.status_kt='Aktif'");

                //  $terjualbarang1Row = mysqli_num_rows($terjualbarang1);
                // $jumlahKotak1Row = mysqli_num_rows($jumlahKotak1);

                //  $terjualbarang2Row = mysqli_num_rows($terjualbarang2);
                //  //$jmlbarang2Row = mysqli_num_rows($jmlbarang2);

                //  $terjualbarang3Row = mysqli_num_rows($terjualbarang3);
                 //$jmlbarang3Row = mysqli_num_rows($jmlbarang3);
                $aktifRow = mysqli_num_rows($aktif);
                $nonaktifRow = mysqli_num_rows($nonaktif);

?>

<!-- jQuery 3 -->

<script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url('AdminLTE/bower_components/Flot/jquery.flot.js')?>"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('AdminLTE/bower_components/Flot/jquery.flot.resize.js')?>"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('AdminLTE/bower_components/Flot/jquery.flot.pie.js')?>"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url('AdminLTE/bower_components/Flot/jquery.flot.categories.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/Chart.bundle.js')?>"></script>


<script src="<?php echo base_url('AdminLTE/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/morris.js/morris.min.js')?>"></script>
<!-- FastClick -->

<!-- Page script -->

<script>


//$aktif = $this->db->query("SELECT COUNT(username_pj) FROM penjual where status_pj='Aktif'")->result();


 // function aktif() {
 //    $aktif =$this->db->query("SELECT COUNT(username_pj) FROM penjual where status_pj='Aktif'");
 //    return $aktif
 //  }

 //   function nonaktif() {
 //    $nonaktif = $this->db->query("SELECT COUNT(username_pj) FROM penjual where status_pj='Belum Aktif'");
 //    return $nonaktif
 //  }
 // $aktif =$this->db->query("SELECT COUNT(username_pj) FROM penjual where status_pj='Aktif'");
 // $nonaktif = $this->db->query("SELECT COUNT(username_pj) FROM penjual where status_pj='Belum Aktif'");

 // $(function () {
//$aktif =$this->db->query("SELECT COUNT(username_pj) FROM penjual where status_pj='Aktif'")->result_array();

    /*
     * DONUT CHART
     * -----------
 //     */

    var donutData = [
      { label: 'Aktif', data: <?php echo $aktifRow?> , color: '#77BFC7' },
      { label: 'Tidak Aktif', data: <?php echo $nonaktifRow?>, color: '#C77F77' },
      //{ label: 'Series4', data: 50, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.35,
          label      : {
            show     : true,
            radius   : 2 / 3,
           formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })


var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($userPenjual)) { echo '"' . $b['username_pj'] . '",';}?>],
                    datasets: [{
                            label: 'Total Saldo',
                            data: [<?php while ($p = mysqli_fetch_array($saldo)) { echo '"' . $p['saldo'] . '",';}?>],

 backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });



var ctx = document.getElementById("myChart2");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($namaBarang)) { echo '"' . $b['nama_barang'] . '",';}?>],
                    datasets: [{
                            label: 'Total Terjual',
                            data: [<?php while ($p = mysqli_fetch_array($barangTerjual)) { echo '"' . $p['terjual'] . '",';}?>],

 backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });














    //  
    /*
    /*
     * END DONUT CHART
     */

 // })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
</body>
</html>