<html>
<head>



 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">



</head>
<body>

	<?php 
	include 'koneksi.php';

	
	?>
	<div class="col-lg-12 grid-margin stretch-card" >
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">SMKN 2 SINGOSARI</h1>
                    	
                    <br>	<br>	

                    <table class="table table-border" align="center" border="1">
						</td></tr>
						</tabel><tabel>
						<tr class="info"><th >No</th><th >Nisn</th><th>Tanggal Bayar</th><th>Bulan</th><th>Jumlah Bayar</th>
						
						</tr>
						<?php 
						$no = 1;
						$sql = mysqli_query($koneksi,"select * from pembayaran where nis='$nis'");
						while($data = mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nisn']; ?></td>
							<td><?php echo $data['tgl_bayar']; ?></td>
							<td><?php echo $data['bulan']; ?></td>
							<td><?php echo $data['jumlah_bayar']; ?></td>
						</tr>
						<?php 
						}
						?>
					</table>
					</div>
                </div>
              </div>


    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
</body>
</html>