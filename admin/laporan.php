
      <?php 
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
                </span> LAPORAN TRANSAKSI </h3>
              	<input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
            
            <span class="input-group-btn">
              <!-- Buat sebuah tombol search dan beri id btn-search -->
              <button class="btn btn-primary btn-sm" type="button" id="btn-search">SEARCH</button>
            </span>
                 </div>
            <?php

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
                             <th width="15%">Aksi</th>

                                            </tr>
                                            </thead>
                                            <?php
                                            include "koneksi.php";
                                            $sql="select siswa.nis, siswa.nama, user.nama_petugas, pembayaran.tgl_bayar, pembayaran.bulan, pembayaran.tahun, pembayaran.jumlah_bayar from siswa, pembayaran, user WHERE pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=user.id_petugas ORDER BY pembayaran.tgl_bayar DESC";

                                            $hasil=mysqli_query($koneksi,$sql);
                                            $no=0;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                $no++;

                                                ?>
                                                <tbody>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $data["nis"];   ?></td>
                                                    <td><?php echo $data["nama"];   ?></td>
                                                    <td><?php echo $data["nama_petugas"];   ?></td>
                                                    <td><?php echo $data["tgl_bayar"];   ?></td>
                                                    <td><?php echo $data["bulan"];   ?></td>
                                                    <td><?php echo $data["tahun"];   ?></td>
                                                    <td><?php echo $data["jumlah_bayar"];   ?></td>
                                                    <td>
                                                        <a href="update_siswa.php?nisn=<?php echo htmlspecialchars($data['nisn']); ?>" class="btn btn-warning btn-sm" role="button">Update</a>
                                                        <a href="delete_siswa.php?nisn=<?php echo htmlspecialchars($data["nisn"]); ?>" class="btn btn-danger btn-sm"  role="button"> Delete</a>
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
        <?php include '_footer.php' ?>