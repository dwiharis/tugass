<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
	include 'koneksi.php';
	$id=$_GET['id_pembayaran'];
	
	?>
 <table>
		</td></tr>
		</tabel><tabel>
		<tr class="info"><th width="50">No</th><th width="100">Nisn</th><th>Tanggal Bayar</th><th>Bulan</th><th>Jumlah Bayar</th>
		<th>&nbsp;</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from pembayaran where id_pembayaran='$id'");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nisn']; ?></td>
			<td><?php echo $data['tgl_bayar']; ?></td>
			<td><?php echo $data['bulan']; ?></td>
			<td><?php echo $data['jumlah_bayar']; ?></td>
		</tr>
		<?php 
		}
		?>
		</table>
<script>
	window.print();
</script>
</body>
</html>