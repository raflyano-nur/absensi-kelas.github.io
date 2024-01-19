<?php
session_start();
error_reporting(1);
include "../db/koneksi.php";

// if (!isset($_SESSION["login"])) {
//   # code...
//   // header("location: views/login.php");
//   echo "<script>
//      window.location.href = 'views/login.php';
//      //alert('silahkan login terlebih dahulu');
//      </script>";
// }
?>
        <!-- start form pencaharian -->
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <form class="d-md-none d-md-flex ms-2 mt-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
            </div>
          </div>
        </div>
        <!-- end form pencaharian -->
        
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                  
                  <!-- start tag php -->
                  <?php include "controllers/home.php"; ?>
                  <!-- end tag php -->
                  
                    <div class="col-sm-6 col-lg-6 col-xxl-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-capitalize">Total siswa</p>
                                <h6 class="mb-0"><?= $jumlahSiswa ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 col-xxl-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-school fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-capitalize">Total Kelas</p>
                                <h6 class="mb-0"><?php echo $jumlahKelas; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->