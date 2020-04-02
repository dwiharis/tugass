
      <?php 
      include 'koneks.php';
include '_navbar.php';
 ?>

      <!-- partial -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Transaksi Pembayaran SPP </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
 


  <div class="col-13" >
   <div class="card">
    <div class="card-body">

       <form method="get" action="">
	NIS: <input type="text" name="nisn" />
	<input type="submit" name="cari" value="Cari Siswa" />
</form>

<?php
if(isset($_GET['nisn']) && $_GET['nisn']!=''){
	$sqlSiswa = mysqli_query($koneksi, "select pembayaran.nisn,pembayaran.tgl_bayar,pembayaran.bulan_bayar,pembayaran.tahun_bayar,pembayaran.jumlah_bayar from pembayaran,siswa where siswa.nisn=pembayaran.nisn ");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nisn'];
?>

<h3>Biodata Siswa</h3>
<table>
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><?php echo $ds['kelas']; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td><?php echo $ds['tahunajaran']; ?></td>
	</tr>
</table>

<h3>Tagihan SPP Siswa</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>

	
</table>

<?php
}
?>
          </div></div></div>


          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>

