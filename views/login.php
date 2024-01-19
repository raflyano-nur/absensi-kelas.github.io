<?php
session_start();
error_reporting(1);
include "../db/koneksi.php";

if (isset($_SESSION["login"])) {
  # code...
  echo "<script>
    window.location.href = '../index.php?page=home';
    alert('kamu sudah login');
    </script>";
}
$result = mysqli_query($koneksi, "SELECT * FROM users");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <title>DASHMIN - Bootstrap Admin Template</title>
    <style>
         label {
           text-transform: capitalize;
         }
       </style>
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
    <!-- Add this style in the head section -->
<style>
body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
    }

    

    .login-form {
        background-color: #ffffff; /* White background for the form */
        border-radius: 10px; /* Rounded corners for the form */
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle lift effect */
    }

    .form-floating {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff; /* Primary color for the submit button */
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-primary {
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3; /* Ganti dengan warna yang diinginkan */
}
  
    /* Add this style after the previous styles */

/*     .container {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
} */

    .form-control {
        border: 1px solid #ced4da; /* Add a light border to input fields */
        border-radius: 5px;
        padding: 10px;
    }

    .form-control:focus {
        border-color: #007bff; /* Change border color on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a subtle box shadow on focus */
    }
    
    .form-floating {
      position: relative;
    }

    .form-floating i {
      position: absolute;
      right: 15px;
      top: 20%;
      transform: translateY(-50%);
      cursor: pointer;
    }
    
     /* Existing styles... */
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .login-form {
        animation: fadeIn 1s ease-in-out;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

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
                    <a href="index.php?page=home" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-capitalize" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>master data</a>
                        <div class="dropdown-menu bg-transparent border-0 text-capitalize">
                          <a href="index.php?page=siswa" class="nav-item nav-link"><i class="fa fa-user me-2"></i>data siswa</a>
                          <a href="index.php?page=absen" class="nav-item nav-link"><i class="fa fa-user me-2"></i>data absen</a>
                          <a href="index.php?page=user" class="nav-item nav-link"><i class="fa fa-user me-2"></i>data user</a>  
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
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img class="rounded-circle" src="../img/LOGO2.jpeg" alt="" style="width: 40px; height: 40px;"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $row[
                              "username"
                            ] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>My Profile</a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                        <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                        </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            
            
<?php if (isset($_POST["login"])) {
  # code...
  $email = $_POST["email"];
  $pass = md5($_POST["password"]);

  $result = mysqli_query(
    $koneksi,
    "SELECT * FROM users WHERE email = '$email' AND password = '$pass'"
  );
  if (mysqli_num_rows($result) > 0) {
    # code...
    $row = mysqli_fetch_array($result);
    $_SESSION["login"] = $row;
    $_SESSION["id_user"] = $row["id_user"];
    $_SESSION["nama_user"] = $row["username"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["password"] = $row["password"];
    $_SESSION["level"] = $row["level"];
    echo "<script>
    alert('Berhasil login');
    window.location.href = '../index.php?page=home'
    </script>";
  } else {
    echo "<script>alert('Email AND Password salah ');</script>";
  }
} ?>
      <!-- Form Start -->
    <div class="login-form container animate__animated animate__fadeIn animate__duration-1s animate__delay-1s">
    <!-- Your form content -->

      <div class="card container mt-5">
        <div class="card-body">

            <div class="login-form container">
                <h1 class="text-center text-uppercase fw-bold" style="font-family: 'Poppins', sans-serif;
">login</h1>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" 
                            placeholder="Password" required>
                <i class="fa fa-eye" id="togglePassword"></i>
                
      <label for="floatingPassword">Password</label>
                            

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
    </div>
          <!-- Form end -->


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
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      this.classList.toggle('fa-eye-slash');
    });
    
      document.getElementById('showPassword').addEventListener('change', function() {
    var passwordInput = document.getElementById('floatingPassword');
    passwordInput.type = this.checked ? 'text' : 'password';
});
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();

   //  document.addEventListener('DOMContentLoaded', function () {
//         const form = document.querySelector('form');
// 
//         form.addEventListener('submit', function (event) {
//             event.preventDefault();
// 
//             const email = document.querySelector('[name="email"]').value;
//             const password = document.querySelector('[name="password"]').value;
// 
//             if (!email || !password) {
//                 alert('Please fill in all fields.');
//                 return;
//             }
// 
//             // Add your existing login code here
// 
//             // If login is successful, you can redirect or display a success message
//         });
//     });
</script>
</body>

</html>