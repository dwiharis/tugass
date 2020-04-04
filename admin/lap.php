<?php


include 'koneksi.php';
   

      if(isset($_REQUEST['submit'])){

         $submit = $_REQUEST['submit'];

         $tgl1 = $_REQUEST['tgl1'];

         $tgl2 = $_REQUEST['tgl2'];

         

         //echo $tgl1.'-'.$tgl2;

         $q = "select siswa.nis, siswa.nama, user.nama_petugas, pembayaran.tgl_bayar, pembayaran.bulan, pembayaran.tahun, pembayaran.jumlah_bayar from siswa, pembayaran, user WHERE pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=user.id_petugas ORDER BY pembayaran.tgl_bayar DESC";

         

         echo '<h2>Rekap Pembayaran SPP <small>'.date('d M Y', strtotime($tgl1)).' sampai '.date('d M Y', strtotime($tgl2)).'</small></h2><hr>';

         echo '<a class="noprint pull-right btn btn-default" onclick="fnCetak()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</a>';

         

      } else {

         $tgl = date("d/m/Y");

         $q = "SELECT pembayaran,sum(jumlah) FROM pembayaran WHERE tgl_bayar='$tgl' GROUP BY pembayaran";

         echo '<h2>Rekap Pembayaran <small>'.$tgl.'</small></h2><hr>';

      }

      

      $sql = mysql_query($q);

      

      echo '<div class="row">';

      echo '<div class="col-md-5">';

?>

<div class="well well-sm noprint">

<form class="form-inline" role="form" method="post" action="">

  <div class="form-group">

    <label class="sr-only" for="tgl1">Mulai</label>

    <input type="date" class="form-control" id="tgl1" name="tgl1">

  </div>

  <div class="form-group">

    <label class="sr-only" for="tgl2">Hingga</label>

    <input type="date" class="form-control" id="tgl2" name="tgl2">

  </div>

  <button type="submit" name="submit" class="btn btn-default">Tampilkan</button>

</form>

</div>

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
                                                    <td><?php echo number_format($data["jumlah_bayar"]);   ?></td>
                                                    
                                                </tr>
                                                </tbody>
                                                <?php
                                            }
                                            ?>
                                        </table> 



?>