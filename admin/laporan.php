<?php
include '_nav.php';

include 'koneksi.php';
   error_reporting(0);

      if(isset($_REQUEST['submit'])){

         $submit = $_REQUEST['submit'];

         $tgl1 = $_REQUEST['tgl1'];

         $tgl2 = $_REQUEST['tgl2'];

         

         //echo $tgl1.'-'.$tgl2;

         $q = "select siswa.nis, siswa.nama, user.nama_petugas, pembayaran.tgl_bayar, pembayaran.bulan, pembayaran.tahun, pembayaran.jumlah_bayar from siswa, pembayaran, user WHERE pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=user.id_petugas ORDER BY pembayaran.tgl_bayar DESC";

         

       

    

         

      } 
      

      $sql = mysql_query($q);

      

 
?>
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Form SPP </h3>
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

                    <a href="cetak_laporan.php" class="btn btn-warning" role="button" target="output">Cetak</a><br><br>
                   
<form class="form-inline" role="form" method="post" action="">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">

    <label class="sr-only" for="tgl1">Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tgl1" name="tgl1">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                             <label class="sr-only" for="tgl2">Hingga</label>
                            <div class="col-sm-9">  
    <input type="date" class="form-control" id="tgl2" name="tgl2">

                            
                              
                            </div>
                          </div>
                        </div>                
                      </div>
      
                       <button type="submit" name="submit" class="btn btn-outline-primary btn-icon-text btn-md ">Tampilkan</button>&nbsp;
                      <button class="btn btn-light">Cancel</button>
                    </form>


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

                                            </tr>
                                            </thead>
                                            <?php
                                            include "koneksi.php";
                                            $sql="select siswa.nis, siswa.nama, user.nama_petugas, pembayaran.tgl_bayar, pembayaran.bulan, pembayaran.tahun, pembayaran.jumlah_bayar from siswa, pembayaran, user WHERE pembayaran.tgl_bayar BETWEEN '$tgl1' AND '$tgl2' AND pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=user.id_petugas ORDER BY pembayaran.tgl_bayar DESC";

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
                                                    <td>Rp.<?php echo number_format($data["jumlah_bayar"]);   ?></td>
                                                    
                                                </tr>
                                                </tbody>
                                                <?php
                                            }
                                            ?>
                                        </table> 

</div></div></div>
<?php include '_fot.php'; ?>