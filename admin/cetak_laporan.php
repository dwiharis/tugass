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
	$tgl1=$_GET['tgl1'];
  $tgl2=$_GET['tgl2'];
	
	?>
	<div class="col-lg-12 grid-margin stretch-card" >
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">SMKN 2 SINGOSARI</h1>

                    <br>	<br>	

                    <table class="table table-border" align="center" border="1">
						</td></tr>
						</tabel><tabel>
						<tr class="info"> <th width="2%">No</th>
                             <th width="10%">Nis</th>
                             <th width="20%">Nama</th>
                             <th width="5%">Petugas</th>
                             <th width="5%">Tanggal Bayar</th>
                             <th width="5%">Bulan</th>
                             <th width="5%">Periode</th>
                             <th width="5%">Besar SPP</th>
						
						</tr>
						<?php 
						$no = 1;
						$sql = mysqli_query($koneksi,"select siswa.nis, siswa.nama, user.nama_petugas, pembayaran.tgl_bayar, pembayaran.bulan, pembayaran.tahun, pembayaran.jumlah_bayar from siswa, pembayaran, user WHERE pembayaran.tgl_bayar BETWEEN '$tgl1' AND '$tgl2' AND pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=user.id_petugas ORDER BY pembayaran.tgl_bayar DESC");

						while($data = mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><?php echo $no++; ?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['nama_petugas']; ?></td>
							<td><?php echo $data['tgl_bayar']; ?></td>
							<td><?php echo $data['bulan']; ?></td>
                            <td><?php echo $data['tahun']; ?></td>
							<td>Rp.<?php echo number_format($data['jumlah_bayar']); ?></td>
						</tr>
						<?php 
						}
						?>
					</table>
					</div>
                </div>
              </div>
<script>
	window.print();
</script>

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