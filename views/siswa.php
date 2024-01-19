<?php
session_start();
error_reporting(1);
include "../db/koneksi.php";

if (!isset($_SESSION["login"])) {
  # code...
  echo "<script>
    window.location.href = 'views/login.php';
    alert('kamu belum login');
    </script>";
}
?>
<div class="container-fluid pt-4 px-4">
    <div class="row text-capitalize g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title fs-bold d-flex justify-content-center align-items-center">data siswa</h4>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
<!-- <div class="col-lg-12"> -->
<div class="row g-4">
    <div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
    <div class="table-responsive">
        <table  class="table table-striped table-bordered text-capitalize" id="zero_config">
          
          <a href="index.php?page=tambah" class="nav-item nav-link active text-success"><i class="fa fa-plus me-2 text-success"></i>Tambah</a>
            <thead class="text-uppercase">
                <tr>
                    <th>no</th>
                    <th>nis</th>
                    <th>nama siswa</th>
                    <th>kelas</th>
                    <th>jenis kelamin</th>
                    <th>agama</th>
                    <th>alamat</th>
                    <th>opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db/koneksi.php";
                //                 $IdDel = $_GET["iddel"];
                //                 if ($IdDel) {
                //                   # code...
                //                   $querydel = "DELETE FROM tbl_siswa WHERE nis=" . $IdDel;
                //                   $resultdel = mysqli_query($koneksi, $querydel);
                //                   if ($resultdel) {
                //                     # code...
                //                     echo "
                //                         <script>alert('Produk Berhasil Dihapus');window.location.href='index.php?page=produk';</script>
                //                         ";
                //                   }
                //                 }

                $querytampil =
                  "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas";
                $no = 1;
                $sqltampil = mysqli_query($koneksi, $querytampil);
                while ($prd = mysqli_fetch_array($sqltampil)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $prd["nis"]; ?></td>
                    <td><?php echo $prd["nama_siswa"]; ?></td>
                    <td><?php echo $prd["nama_kelas"]; ?></td>
                    <td><?php echo $prd["jk"]; ?></td>
                    <td><?php echo $prd["agama"]; ?></td>
                    <td><?php echo $prd["alamat"]; ?></td>
                    <td>
                      <a href="index.php?page=edit&id=<?php echo $prd[
                        "nis"
                      ]; ?>" class="nav-item nav-link active btn btn-warning mb-2">Edit</a>
                      <a href="controllers/tambah_data.php?id=<?php echo $prd[
                        "nis"
                      ]; ?>" class="nav-item nav-link active btn btn-sm btn-danger">Hapus</a>
                    </td>
                    
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>
</div>