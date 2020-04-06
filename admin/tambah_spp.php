
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMKN 2 SINGOSARI</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- End layout styles -->
  </head>
  <body>
     <?php

    include "koneksi.php";
    
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_spp=input($_POST["id_spp"]);
        $tahun=input($_POST["tahun"]);
        $nominal=input($_POST["nominal"]);

        $sql="insert into spp (id_spp,tahun,nominal) values
    ('$id_spp','$tahun','$nominal')";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil > 0) {
            header("Location:spp.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="index.html">SMKN 2 SIGOSARI</a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="img/logo.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">

          <div class="mdi mdi mdi-account  mr-2">
            <?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
  ?>

 
 <b><?php echo $_SESSION['level']; ?></b>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="logout.php">
            <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
        </div>
      </li>

  
    </ul>

  </div>
</nav>
   <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Input data</span>
                  <i class="menu-arrow"></i>
                   <i class="mdi mdi-checkbox-multiple-blank  menu-icon"></i>
                   </a>
                   <div class="collapse" id="ui-basic">
                   <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="kelas.php">Kelas</a></li>
                       <li class="nav-item"> <a class="nav-link" href="petugas.php">petugas</a></li>
                        <li class="nav-item"> <a class="nav-link" href="spp.php">spp</a></li>
                          <li class="nav-item"> <a class="nav-link" href="siswa.php">Siswa</a></li> 
                  </ul>
                  </div>
              </li>
               <li class="nav-item">
              <a class="nav-link" href="transaksi.php">
                <span class="menu-title">Transaksi</span>
                <i class="mdi mdi-buffer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="laporan.php">
                <span class="menu-title">Laporan</span>
                <i class="mdi mdi-book menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="History.php">
                <span class="menu-title">History</span>
                <i class="mdi mdi-book menu-icon"></i>
              </a>
            </li>
           
          </ul>
        </nav>

      <!-- partial -->

        <!-- partial -->
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
                    <form class="form-sample" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID Spp</label>
                            <div class="col-sm-9">
                              <?php 
                              $query="SELECT id_spp FROM spp where id_spp";
                              $hasil=$koneksi->query($query);
                              $idd=0;
                              while ($row=$hasil->fetch_array()) {
                                $idd=$row['id_spp'];
                               }

                               $id_s=$idd+1;
                               ?>
                             <input type="text" name="id_spp" class="form-control" placeholder="ID Spp" value=" <?php  echo $id_s ?>  " required readonly />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                              <input type="text" name="tahun" class="form-control"  placeholder="Tahun" required/>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nominal</label>  
                            <div class="col-sm-9">  
                              <input type="text"  name="nominal" class="form-control" placeholder="nominal" required/>
                              
                            </div>
                          </div>
                        </div>                
                      </div>
      
                       <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>



          </div>

          <script type="text/javascript">
            function rupiah($txt1){
  
  $hasil_rupiah = number_format($txt1,2,',','.');
  return $hasil_rupiah;
 
}
          </script>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_fot.php' ?>


           