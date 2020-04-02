<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	if($_GET['act']=='bayar'){

		$idspp 	= $_GET['id'];
		$nis	= $_GET['nis'];

		//membuat nomor pembayaran
		$today = date("ymd");
		$query = mysqli_query($konek, "SELECT * FROM pembayaran ");
		$data = mysqli_fetch_array($query);
		

		//tanggal Bayar
		$tglBayar 	= date('Y-m-d');

		//id admin
		$admin = $_SESSION['id'];

		mysqli_query($konek, "UPDATE spp SET 
											tglbayar='$tglBayar',
											ket='LUNAS',
											
									WHERE id_pembayaran='$id_pembayaran'");

		header('location:pembayaran.php?nis='.$nis);
	}
}
?>