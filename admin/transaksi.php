
      <?php 
      include 'koneksi.php';
include '_navbar.php';
error_reporting(0);

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

            <div class="col-12">
                <div class="card">
                  <div class="card-body">

                  	<form class="form-horizontal" role="form" method="post" action="./transaksi.php">
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" required autofocus>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-3">
					      <button type="submit" name="submit" class="btn btn-success btn-md">Lanjut</button>
					    </div>
					  </div>
					</form>
					<br><br>

          

 
		<?php
		if(isset($_REQUEST['submit'])){
		//proses pembayaran secara bertahap
		$submit = $_REQUEST['submit'];
		$nisn = $_REQUEST['nisn'];
		
		//proses simpan pembayaran
		if($submit=='bayar'){
			$id_pembayaran 	= $_REQUEST['id_pembayaran'];
			$id_petugas 	= $_REQUEST['id_petugas'];
			$nisn 			= $_REQUEST['nisn'];
			$tgl_bayar 		= $_REQUEST['tgl_bayar'];
			$bulan 			= $_REQUEST['bulan'];
			$tahun			= $_REQUEST['tahun'];
			$id_spp 		= $_REQUEST['id_spp'];
			$jumlah_bayar 	= $_REQUEST['jumlah_bayar'];

			$qbayar = mysqli_query($koneksi, "INSERT INTO pembayaran(id_pembayaran, id_petugas, nisn, tgl_bayar, bulan, tahun, id_spp, jumlah_bayar) VALUES('$id_pembayaran', '$id_petugas', '$nisn', '$tgl_bayar', '$bulan', '$tahun', '$id_spp', '$jumlah_bayar')");
			
			if($qbayar > 0){
				header("Location:transaksi.php");

			}
		}
		

		
		//tampilkan data siswa
			
		$sql = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
		list($nisn,$nis,$nama_siswa,$nama_kelas,$alamat,$no_telfon,$id_spp ) = mysqli_fetch_array($sql);
		
     echo '<div class="row">';
		echo '<div class="col-sm-12"><table class="table ">';
		echo '<tr><td colspan="2">Nomor Induk</td><td colspan="4">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nisn.'</td>';
		
		echo '<tr><td colspan="2">Nama</td><td colspan="4">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nama_siswa.'</td></tr>';
		
		echo '<tr><td colspan="2">Kelas</td><td colspan="4">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nama_kelas.'</td></tr>';
      
		echo '<tr><td colspan="6">';;
?>
				<form class="form-inline " role="form" method="post" action="./transaksi.php">
 				    <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID Spp</label>
                            <div class="col-sm-7">
							<?php 
                              $query="SELECT id_pembayaran FROM pembayaran where id_pembayaran";
                              $hasil=$koneksi->query($query);
                              $idd=0;
                              while ($row=$hasil->fetch_array()) {
                                $idd=$row['id_pembayaran'];
                               }

                               $id_p=$idd+1;
                               ?>
                               <input type="text" name="id_pembayaran" class="form-control" placeholder="ID Spp" value=" <?php  echo $id_p ?>  " required readonly />
  							</div>
  						</div>
  					</div>
  					<div class="col-md-5">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Petugas</label>
                           <div class="col-sm-7">
							<select name="id_petugas" id="id_petugas" class="form-control">
								<?php

									$q = mysqli_query($koneksi, "SELECT * FROM user");
									while($data = mysqli_fetch_array($q)){
										echo '<option value="'.$data['nama_petugas'].'">'.$data['nama_petugas'].'</option>';
									}

								?>
							</select>
						</div>
					</div>
				</div>

 				 <input type="hidden" name="nisn" value="<?php echo $nisn; ?>">
  
 				 <input type="hidden" name="tgl_bayar" value="<?php echo date("Y-m-d"); ?>">
  				<div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">bulan</label>
                            <div class="col-sm-9">
                              <select name="bulan" id="bulan" class="form-control">
								<?php
									for($i=1;$i<=12;$i++){
										$b = date('F',mktime(0,0,0,$i,10));
										echo '<option value="'.$b.'">'.$b.'</option>';
									}
								?>
								</select>
                            </div>
                          </div>
                        </div>

 
 				 <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
							<select name="tahun" id="tahun" class="form-control">
							<?php

										$q = mysqli_query($koneksi, "SELECT * FROM spp");
										while($data = mysqli_fetch_array($q)){
											echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
										}

									?>
							</select>
							</div>
						</div>
						</div>
 <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-9">
	<select name="id_spp" id="id_spp" class="form-control">
	<?php

				$q = mysqli_query($koneksi, "SELECT * FROM spp");
				while($data = mysqli_fetch_array($q)){
					echo '<option value="'.$data['nominal'].'">'.$data['nominal'].'</option>';
				}

			?>
	</select>
  </div>
</div></div>

  <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">jumlah</label>
                            <div class="col-sm-9">

		<div class="input-group-addon"></div>
		<input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar">
	</div>
  </div>
</div>
  <button type="submit" class="btn btn-gradient-success btn-rounded btn-md" name="submit" value="bayar">Bayar</button>
</form>
<?php
		echo '</td></tr>';
		echo '</tabel><tabel>';
		echo '<tr class="info"><th width="50">No</th><th width="100">Nisn</th><th>Tanggal Bayar</th><th>Bulan</th><th>Jumlah Bayar</th>';
		echo '<th>&nbsp;</th>';
		echo '</tr>';
		
		//tampilkan histori pembayaran, jika ada
		$qbayar = mysqli_query($koneksi, "SELECT nisn,tgl_bayar,bulan,jumlah_bayar FROM pembayaran WHERE nisn='$nisn' ORDER BY tgl_bayar DESC");
		if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 
			while($tampil = mysqli_fetch_array($qbayar)){
				$no++;
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$tampil['nisn'].'</td>';
				echo '<td>'.$tampil['tgl_bayar'].'</td>';
				echo '<td>'.$tampil['bulan'].'</td>';
				echo '<td>'.$tampil['jumlah_bayar'].'</td><td>';
				
				if( $_SESSION['level'] == 1 ){
					
					$nisn = $tampil['nisn'];
					$tgl_bayar = $tampil['tgl_bayar'];
					$bulan = $tampil['bulan'];
					$jumlah = $tampil['jumlah_bayar'];
					
					
				}
				 echo ' <a href="./cetak.php?submit=nota&nisn='.$nisn.'&tgl_bayar='.$tgl_bayar.'&bulan='.$bulan.'" target="_blank" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>';
				
      				echo '</td></tr>';
				
			} 

				
			//echo '<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';
		} else{'<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';}
		echo '</table></div></div>';
		
	} 
?>
</div></div></div>
<!-- form input nomor induk siswa -->
<?php 
include '_footer.php';
 ?>