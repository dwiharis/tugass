
      <?php 
include '_navbar.php';
include 'koneksi.php';
 ?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
 
<center><h2 class="display-3">SELAMAT DATANG </h2></center>
                            <center><p class="lead">Anda Login Sebagai SISWA yang mempunyai semua Hak Akses</p>
                            <p>Tim Support</p></center>


  <div class="col-lg-12 grid-margin stretch-card" >
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">SMKN 2 SINGOSARI</h1>
                      
                    <br>  <br>  

                    <table class="table table-border" align="center" border="1">
            </td></tr>
            </tabel><tabel>
            <tr class="info"><th >No</th><th >Nisn</th><th>Tanggal Bayar</th><th>Bulan</th><th>Jumlah Bayar</th>
            
            </tr>
            <?php 
            $sis=$_SESSION['nis'];
            $no = 1;
            
            $sql = mysqli_query($konek,"select * from pembayaran where nisn='$sis'");
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
          </div>
                </div>
              </div>





          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>

