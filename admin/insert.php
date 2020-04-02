   <?php
   include 'koneksi.php';
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
      



    
?>