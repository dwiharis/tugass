
      <?php 
include '_nav.php';
 ?>

      <!-- partial -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span>RIWAYAT TRANSAKSI </h3>
              	
                 </div>
            <?php

                            $hariini=date('Y-m-d');
                            
                            include "koneksi.php";


                            if (isset($_GET['nisn'])) {
                                $nisn=htmlspecialchars($_GET["nisn"]);

                                $sql="delete from pembayaran where nisn='$nisn' ";
                                $hasil=mysqli_query($koneksi,$sql);

                                    if ($hasil) {
                                        header("Location:laporan.php");

                                    }
                                    else {
                                        echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

                                    }
                                }
                        ?>
             <div class="col-lg-15 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  	<div>
                  	<span>
                  	<a href="cetak.php" class="btn btn-warning" role="button">Cetak</a>
                  	</span>
                  	</div>
                  	<br>
                  	<input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
            
            <span class="input-group-btn">
              <!-- Buat sebuah tombol search dan beri id btn-search -->
            </span><br><br>

                    <table class="table">
                      
                        <thead>
                             <tr>
                             <th width="2%">No</th>
                             <th width="10%">Nis</th>
                             <th width="20%">Nama</th>
                             <th width="5%">Petugas</th>
                             <th width="5%">Tanggal Bayar</th>
                             <th width="5%">Bulan</th>
                             <th width="5%">Periode</th>
                             <th width="5%">Besar SPP</th>
                             <th width="5%">Aksi</th>

                                            </tr>
                                            </thead>
                                            <?php
                                            include "koneksi.php";
                                            $sql="select pembayaran.id_pembayaran, siswa.nis, siswa.nama, user.nama_petugas, pembayaran.tgl_bayar, pembayaran.bulan, pembayaran.tahun, pembayaran.jumlah_bayar, pembayaran.nisn from siswa, pembayaran, user WHERE pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=user.id_petugas AND pembayaran.tgl_bayar='$hariini' ORDER BY pembayaran.tgl_bayar DESC";

                                            $hasil=mysqli_query($koneksi,$sql);
                                            $no=0;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                $no++;

                                                ?>
                                                <tbody>
                                                <tr>
                                                    <?php $id_bayar=$data["id_pembayaran"];
                                                          $nisn=$data["nisn"];
                                                     ?>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $data["nis"];   ?></td>
                                                    <td><?php echo $data["nama"];   ?></td>
                                                    <td><?php echo $data["nama_petugas"];   ?></td>
                                                    <td><?php echo $data["tgl_bayar"];   ?></td>
                                                    <td><?php echo $data["bulan"];   ?></td>
                                                    <td><?php echo $data["tahun"];   ?></td>
                                                    <td>Rp.<?php echo number_format($data["jumlah_bayar"]);   ?></td>
                                                    <td>
                                                      <?php 
                                                      echo ' <a href="./cetak.php?submit=nota&id_pembayaran='.$id_bayar.'&nisn='.$nisn.'" target="_blank" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true">Cetak</span></a>'; ?>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <?php
                                            }
                                            ?>
                                        </table> 
                                    </div>
                                </div>
          </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_fot.php' ?>