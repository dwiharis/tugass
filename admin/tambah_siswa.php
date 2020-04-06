
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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nisn=input($_POST["nisn"]);
        $nis=input($_POST["nis"]);
        $nama=input($_POST["nama"]);
        $id_kelas=input($_POST["id_kelas"]);
        $alamat=input($_POST["alamat"]);
        $no_telp=input($_POST["no_telp"]);
        $id_spp=input($_POST["id_spp"]);

        //Query input menginput data kedalam tabel 
        $sql="insert into siswa (nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) values
        ('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')";
        

        $hasil=mysqli_query($koneksi,$sql);
        var_dump($hasil);

        if ($hasil) {
            header("Location:siswa.php");
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
                </span> Form Siswa </h3>
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
                            <label class="col-sm-3 col-form-label">ID Petugas</label>
                            <div class="col-sm-9">
                              <?php 
                              $query="SELECT id_petugas FROM user where id_petugas";
                              $hasil=$koneksi->query($query);
                              $id=0;
                              while ($row=$hasil->fetch_array()) {
                                $id=$row['id_petugas'];
                               }

                               $id_pet=$id+1;
                               ?>

                              <input type="text" class="form-control" name="id_petugas" value="P<?php echo $id_pet; ?>"  readonly/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nisn</label>
                            <div class="col-sm-9">
            <input type="text" name="nisn" class="form-control" placeholder="Masukan Nisn" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nis</label>
                            <div class="col-sm-9">
            <input type="text" name="nis" class="form-control" placeholder="Masukan Nis" required />

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Siswa</label>
                            <div class="col-sm-9">
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
                            </div>
                          </div>
                        </div> 
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kelas</label>
                            <div class="col-sm-9">
            <select class="form-control" name="id_kelas">
            <?php
                mysql_connect("localhost","root","");
                mysql_select_db("spp"); 
                $sql_kelas="SELECT * FROM kelas";
                $has=mysql_query($sql_kelas);
            
                while ($data=mysql_fetch_array($has)) {
                ?>
            
                <option value=<?php echo $data['nama_kelas']; ?>><?php echo $data['nama_kelas']; ?></option>
                <?php }?>
            </select>
                            </div>
                          </div>
                        </div>    
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required />
                            </div>
                          </div>
                        </div>    
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomer Telfon</label>
                            <div class="col-sm-9">
            <input type="text" name="no_telp" class="form-control" placeholder="Masukan No Telfon" required />
                            </div>
                          </div>
                        </div>    
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-9">
            <select class="form-control form-control-line" name="id_spp">
                <?php
                mysql_connect("localhost","root","");
                mysql_select_db("spp"); 
                $sql_spp="SELECT * FROM spp";
                $hasil=mysql_query($sql_spp);
            
                while ($dataa=mysql_fetch_array($hasil)) {
                ?>
                <option value=<?php echo $dataa['nominal']; ?> ><?php echo $dataa['nominal']; ?></option>
                <?php }?>
             </select>
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
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_fot.php' ?>


           