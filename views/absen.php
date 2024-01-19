<style>
  .card {
  border-radius: 5px;
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  position: relative;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-body {
  display: none;
}
</style>
<?php
session_start();
//   if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// }
include "db/koneksi.php";
$result = mysqli_query($koneksi, "SELECT * FROM users");
$row = mysqli_fetch_array($result);
$id_user = $row["id_user"];
?>

<!-- Begin Page Content -->
<div class="container ps-4 pe-4">
  <!-- Page Heading -->
  <h1 class="mb-4 mt-4 text-gray-800">Absensi</h1>
  
  <!-- pengisian absen -->
  <div class="card shadow mb-3">
    <div class="card-header text-capitalize" onclick="toggleCollapse()">
      <div class="d-flex align-items-center justify-content-between">
        menu pengisian absensi
        <i class="fas fa-info-circle"></i>
      </div>
    </div>
    <div class="card-body" id="collapseContent">
      <form role="form" action="views/detailabsensi.php" method="get" name="postform" enctype="multipart/form-data">
        <div class="form-group">
          <label for="kelas">Kelas</label>
          <select id="kelas" class="form-control" name="kelas">
            <option selected>
            <?php
            $sql_kelas = mysqli_query(
              $koneksi,
              "select * from kelas where id_user='$id_user'"
            );
            while ($data = mysqli_fetch_array($sql_kelas)) {
              echo "<option value='$data[0]' > $data[1] </option>";
            }
            ?>  
            </option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="jadwal">Jadwal</label>
          <select id="jadwal" class="form-control" name="jadwal">
            <option selected>Minggu 1</option>
            <option>Minggu 2</option>
            <option>Minggu 3</option>
            <option>Minggu 4</option>
            <option>Minggu 5</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Lihat</button>
      </form>
    </div>
  </div>
  
  <!-- rekap absen -->
  <div class="card shadow">
    <div class="card-header text-capitalize" onclick="toggleCollapseTwo()">
      <div class="d-flex align-items-center justify-content-between">
        Rekap absensi
        <i class="fas fa-info-circle"></i>
      </div>
    </div>
    <div class="card-body" id="collapseContentTwo">
      <form role="form" action="views/rekapabsen.php" method="get" name="postform" enctype="multipart/form-data">
        <div class="form-group">
          <label for="kelas">Kelas</label>
          <select id="kelas" class="form-control" name="kelas">
            <?php
            $sql_kelas = mysqli_query(
              $koneksi,
              "select * from kelas where id_user='$id_user'"
            );
            while ($data = mysqli_fetch_array($sql_kelas)) {
              echo "<option value='$data[0]' > $data[1] </option>";
            }
            ?>   
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Pilih Kelas</button>
      </form>
    </div>
  </div>
</div>

<script>
  function toggleCollapse() {
  var content = document.getElementById("collapseContent");
  content.style.display = (content.style.display === "block") ? "none" : "block";
}

function toggleCollapseTwo() {
  var content = document.getElementById("collapseContentTwo");
  content.style.display = (content.style.display === "block") ? "none" : "block";
}
</script>

