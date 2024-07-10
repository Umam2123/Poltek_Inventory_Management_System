<?php 
  
  include '../koneksi.php';

if ( !isset($_SESSION["idinv2"])) {
  header("Location: login_petugas.php");
  exit();
}


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $judul; ?></title>

    <!-- boootstrap -->
    <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="../css/tampilanadmin.css" rel="stylesheet">

  </head>
  <body>
    <!-- Menu -->
    <div id="wrapper">


          <?php 
          $id = $_SESSION['idinv2'];
           include '../koneksi.php';
           $sql = "SELECT * FROM tb_petugas WHERE id_petugas = '$id'";
           $query = mysqli_query($koneksi, $sql);
            $r = mysqli_fetch_array($query);

           ?>
          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               </i> <?php echo $r['nama']; ?>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                  <form class="" action="logout_petugas.php" onclick="return confirm('yakin ingin logout?');" method="post">
                    <button class="btn btn-default" type="submit" name="keluar"><i class="fa fa-sign-out"></i> Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>

        <!-- menu samping -->
       <?php
       include('sidebar.php');
       ?>
      </nav>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Selamat Datang, <?php echo $r['nama']; ?></h1>
          </div>
        </div>

        <div class="row">
                        
               
              
                                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cart-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?php
                                include_once "../koneksi.php";
                                $sql="SELECT count(id_brg_in) as jbrg_in FROM tb_barang_in";
                                $query=mysqli_query($koneksi,$sql);
                                $r=mysqli_fetch_assoc($query);
                                echo "<h3>".$r['jbrg_in']."</h3>";
                                ?>
                                    <div>Jumlah Barang Masuk</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="?m=barangMasuk&s=awal">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gift fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?php
                                include_once "../koneksi.php";
                                $sql="SELECT count(no_ajuan) as jajuan FROM tb_ajuan";
                                $query=mysqli_query($koneksi,$sql);
                                $r=mysqli_fetch_assoc($query);
                                echo "<h3>".$r['jajuan']."</h3>";
                                ?>
                                    <div>Jumlah Ajuan</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="?m=ajuan&s=awal">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?php
                                include_once "../koneksi.php";
                                $sql="SELECT count(val) as jval FROM tb_ajuan WHERE val='0'";
                                $query=mysqli_query($koneksi,$sql);
                                $r=mysqli_fetch_assoc($query);
                                echo "<h3>".$r['jval']."</h3>";
                                ?>
                                    <div>Jumlah Ajuan Yang Disetujui</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="?m=ajuan&s=awal">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
        </div>


      </div>
    </div>


   <?php
   include('footer.php');
   ?>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!--include-->
    <script src="../vendor/css/js/bootstrap.min.js"></script>

  </body>
</html>
