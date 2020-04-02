<?php 
include '_navbar.php';
include 'koneksi.php';
 ?>
 <table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>No</th>
        <th>nisn</th>
        <th>tgl</th>
        <th>bulan</th>
        <th>jumlah</th>
    </tr>
    </thead>
    <?php
    include "koneksi.php";
    $sql="SELECT nisn,tgl_bayar,bulan,jumlah_bayar FROM pembayaran WHERE nisn='$nisn' ORDER BY tgl_bayar DESC";
     if(mysqli_num_rows($sql) > 0){
        $no = 0;
         
      while($tampil = mysqli_fetch_array($qbayar)){
        $no++;

        ?>
        <tbody>
        <tr>
            <td>'.$no.'</td>';
       <td> <?php   echo $tampil['nisn'] ?></td>
        <td><?php   echo $tampil['tgl_bayar']?></td>
        <td><?php   echo $tampil['bulan']?></td>
        <td><?php   echo $tampil['jumlah_bayar']?></td>
        </tr>
        </tbody>
        <?php
    }
    ?>
</table>
