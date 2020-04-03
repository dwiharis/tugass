<?php 
include 'koneksi.php';
 
$nisn = $_GET['nisn'];
 
mysqli_query($koneksi,"delete from kelas where nisn='$nisn'");
header("location:laporan.php");
 
?>