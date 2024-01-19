<?php
session_start();
include "../db/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">
          <!-- Icon Font Stylesheet -->
     <!--  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.css" rel="stylesheet">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    
        <!-- Custom CSS -->
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link
      href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
      rel="stylesheet"
    />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php?page=home" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-uppercase"><i class="fa fa-hashtag me-2"></i>abskel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= $row["username"] ?></h6>
                        <span><?= $row["level"] ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="../index.php?page=home" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-capitalize" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>master data</a>
                        <div class="dropdown-menu bg-transparent border-0 text-capitalize">
                          <a href="../index.php?page=siswa" class="nav-item nav-link"><i class="fa fa-user me-2"></i>data siswa</a>
                          <a href="../index.php?page=absen" class="nav-item nav-link"><i class="fa fa-user me-2"></i>data absen</a>
                          <a href="../index.php?page=user" class="nav-item nav-link"><i class="fa fa-user me-2"></i>data user</a>  
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php?page=home" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img class="rounded-circle" src="../img/LOGO2.jpeg" alt="" style="width: 40px; height: 40px;"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <!-- Topbar Navbar -->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>My Profile</a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                        <a class="dropdown-item" href="views/logout.php" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                        </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            
            

<!-- start content(isi website) -->
   <?php
   //   if ( !isset($_SESSION["login"]) ) {
   //     header("Location: login.php");
   //     exit;
   //
   /*
	if(isset($_session['id'])){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';	
	}*/
   $result = mysqli_query($koneksi, "SELECT * FROM users");
   $row = mysqli_fetch_array($result);
   $id_user = $row["id_user"];

   $id_kelas = $_GET["kelas"];
   $nis = $_GET["nis"];

// $dosen_name = $_SESSION["dosen_user_name"];
// $dosen_foto = $_SESSION["dosen_user_foto"];
?>
<!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Ubah Absensi </h1>
            <form role="form" action="../controllers/editabsensi.php?kelas=<?php echo $id_kelas; ?>&nis=<?php echo $nis; ?>" method="post" name="postform" enctype="multipart/form-data">
			<?php
   $sql = "SELECT *,k.nama_kelas FROM siswa s join kelas k on s.id_kelas=k.id_kelas WHERE nis='$nis'";
   $query = mysqli_query($koneksi, $sql);
   while ($data = mysqli_fetch_array($query)) {
     $nama = $data["nama_siswa"];
     $nama_kelas = $data["nama_kelas"];
   }
   ?>

        <div class="col-md-6">                
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Mahasiswa</h6>
            </div>
            <div class="card-body">             
                <form role="form" action=".php?id=<?php echo $_GET[
                  "kelas"
                ]; ?>" method="post" name="postform" enctype="multipart/form-data">
              <div class="table-responsive">
                  <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <th><?= $nis ?></th>
                        <th><?= $nama ?></th>
                        <th><?= $nama_kelas ?></th>
                    </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">                
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Absensi</h6>
            </div>
            <div class="card-body">             
              <div class="table-responsive">
                  <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php
                        $sql = "SELECT * FROM `absensi` WHERE id_kelas='$id_kelas' AND nis='$nis'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($data = mysqli_fetch_array($query)) {

                          $id_absen = $data[0];
                          $tanggal = $data["jadwal"];
                          $keterangan = $data["keterangan"];
                          ?>
                        <tr>
                            <td><?= $tanggal ?></td>
                            <td>
                            <label class="radio-inline"><input type="radio" name="<?= "ket" .
                              $id_absen ?>" id="<?= "opsi1" .
  $id_absen ?>" <?php if ($keterangan == "hadir") {
  echo "checked";
} ?> value="hadir">Hadir</label>

<label class="radio-inline"><input type="radio" name="<?= "ket" .
  $id_absen ?>" id="<?= "opsi1" . $id_absen ?>" <?php if (
  $keterangan == "sakit"
) {
  echo "checked";
} ?> value="sakit">Sakit</label>
<label class="radio-inline"><input type="radio" name="<?= "ket" .
  $id_absen ?>" id="<?= "opsi1" . $id_absen ?>" <?php if (
  $keterangan == "izin"
) {
  echo "checked";
} ?> value="izin">Izin</label>

<label class="radio-inline"><input type="radio" name="<?= "ket" .
  $id_absen ?>" id="<?= "opsi1" . $id_absen ?>" <?php if (
  $keterangan == "alfa"
) {
  echo "checked";
} ?> value="alfa">Alfa</label>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Simpan</button> 
                </form>
            </div>           
            </div>
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
<!-- end content(isi website) -->

                  


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center">
                            &copy; <a href="#">Your Site Name Raflyano Ar'rasya Nur syamsi</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
                      
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="views/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

      <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    
    
    <!-- all copy siventor -->
     <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/libs/flot/excanvas.js"></script>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
</body>

</html>