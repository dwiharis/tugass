
      <?php 
      include 'koneksi.php';
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

            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-horizontal" role="form" method="post" action="./transaksi.php">
  <div class="form-group">
    <label for="nisn" class="col-sm-2 control-label">NISN</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" name="submit" class="btn btn-default">Lanjut</button>
    </div>
  </div>
</form>

 
    <?php
    if(isset($_REQUEST['submit'])){
    //proses pembayaran secara bertahap
    $submit = $_REQUEST['submit'];
    $nisn = $_REQUEST['nisn'];
    
    //proses simpan pembayaran
    if($submit=='bayar'){
      $id_pembayaran  = $_REQUEST['id_pembayaran'];
      $id_petugas   = $_REQUEST['id_petugas'];
      $nisn       = $_REQUEST['nisn'];
      $tgl_bayar    = $_REQUEST['tgl_bayar'];
      $bulan      = $_REQUEST['bulan'];
      $tahun      = $_REQUEST['tahun'];
      $id_spp     = $_REQUEST['id_spp'];
      $jumlah_bayar   = $_REQUEST['jumlah_bayar'];

      $qbayar = mysqli_query($koneksi, "INSERT INTO pembayaran(id_pembayaran, id_petugas, nisn, tgl_bayar, bulan, tahun, id_spp, jumlah_bayar) VALUES('$id_pembayaran', '$id_petugas', '$nisn', '$tgl_bayar', '$bulan', '$tahun', '$id_spp', '$jumlah_bayar')");
      
      if($qbayar > 0){
        header("Location:transaksi.php");
        die();
      } else {
        echo 'ada ERROR dgn query';
      }
    }
    

      //proses hapus pembayaran, hanya ADMIN
    if($submit=='hapus'){
      $id_pembayaran  = $_REQUEST['id_pembayaran'];
      $id_petugas   = $_REQUEST['id_petugas'];
      $nisn       = $_REQUEST['nisn'];
      $tgl_bayar    = $_REQUEST['tgl_bayar'];
      $bulan      = $_REQUEST['bulan'];
      $tahun      = $_REQUEST['tahun'];
      $id_spp     = $_REQUEST['id_spp'];
      $jumlah_bayar   = $_REQUEST['jumlah_bayar'];
      
      $qbayar = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
      
      if($qbayar > 0){
        header('Location: ./transaksi.php&submit=v&nisn='.$nisn);
        die();
      } else {
        echo 'ada ERROR dgn query';
      }
    }
    
    //tampilkan data siswa
      
    $sql = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
    list($nisn,$nis,$nama_siswa,$nama_kelas,$alamat,$no_telfon,$id_spp ) = mysqli_fetch_array($sql);
    
      echo '<div class="row">';
    echo '<div class="col-sm-9"><table class="table table-bordered">';
    echo '<tr><td colspan="2">Nomor Induk</td><td colspan="3">'.$nisn.'</td>';
    echo '<td><a href="./cetak.php?nisn='.$nisn.'" target="_blank" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak </a></td></tr>';
    
    echo '<tr><td colspan="2">Nama</td><td colspan="4">'.$nama_siswa.'</td></tr>';
    
    echo '<tr><td colspan="2">Kelas</td><td colspan="4">'.$nama_kelas.'</td></tr>';
      
    echo '<tr><td colspan="2">Pembayaran</td><td colspan="4">';
?>
<form  role="form" method="post" action="./transaksi.php">
  
  <div class="form-group">
    <label class="sr-only" for="id_pembayaran">Id Pembayaran</label>

  <?php

      $sql = mysqli_query($koneksi, "SELECT id_pembayaran FROM pembayaran");
        echo '<input type="text" class="form-control" id="id_pembayaran" value="';

      $id_pembayaran = "00178901";
      if(mysqli_num_rows($sql) == 0){
        echo $id_pembayaran;
      }

      $result = mysqli_num_rows($sql);
      $counter = 0;
      while(list($id_pembayaran) = mysqli_fetch_array($sql)){
        if (++$counter == $result) {
          $id_pembayaran++;
          echo $id_pembayaran;
        }
      }
        echo '"name="id_pembayaran" placeholder="Id Pembayaran" readonly>';

    ?>

  </div>
  <div class="form-group">
    <label class="sr-only" for="id_petugas">Id Petugas</label>
  <select name="id_petugas" id="id_petugas" class="form-control">
  <?php

        $q = mysqli_query($koneksi, "SELECT * FROM user");
        while($data = mysqli_fetch_array($q)){
          echo '<option value="'.$data['id_petugas'].'">'.$data['id_petugas'].'</option>';
        }

      ?>
  </select>
  </div>
  <input type="hidden" name="nisn" value="<?php echo $nisn; ?>">
  
  <input type="hidden" name="tgl_bayar" value="<?php echo date("Y-m-d"); ?>">
  
  <div class="form-group">
    <label class="sr-only" for="bulan">Bulan</label>
  <select name="bulan" id="bulan" class="form-control">
  <?php
    for($i=1;$i<=12;$i++){
      $b = date('F',mktime(0,0,0,$i,10));
      echo '<option value="'.$b.'">'.$b.'</option>';
    }
  ?>
  </select>
  </div>
  <div class="form-group">
    <label class="sr-only" for="tahun">Tahun</label>
  <select name="tahun" id="tahun" class="form-control">
  <?php

        $q = mysqli_query($koneksi, "SELECT * FROM spp");
        while($data = mysqli_fetch_array($q)){
          echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
        }

      ?>
  </select>
  </div>
 <div class="form-group">
    <label class="sr-only" for="id_spp">Id Spp</label>
  <select name="id_spp" id="id_spp" class="form-control">
  <?php

        $q = mysqli_query($koneksi, "SELECT * FROM spp");
        while($data = mysqli_fetch_array($q)){
          echo '<option value="'.$data['id_spp'].'">'.$data['id_spp'].'</option>';
        }

      ?>
  </select>
  </div>
  <div class="form-group">
  <label class="sr-only" for="jumlah_bayar">Jumlah Bayar</label>
  <div class="input-group">
    <div class="input-group-addon">Rp.</div>
    <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar">
  </div>
  </div>
  <button type="submit" class="btn btn-default" name="submit" value="bayar">Bayar</button>
</form>
<?php
    echo '</td></tr>';
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
 
        echo '</td></tr>';
        
      } 
      //echo '<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';
    } else{'<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';}
    echo '</table></div></div>';
    
  } 
?>

