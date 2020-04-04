        
      <?php 
include '_navbar.php';
 ?>
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
        <?php include '_footer.php' ?>


           