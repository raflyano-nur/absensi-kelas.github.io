<?php
error_reporting(true);
include "../db/koneksi.php";

if (isset($_SERVER["REQUEST_METHOD"]) == "GET") {
  $id = $_GET["id"];

  $query = "DELETE FROM siswa WHERE nis = '$id'";
  $result = mysqli_query($koneksi, $query);
  header("location:../index.php?page=siswa");
  if ($_POST["edit"] == "update") {
    $id = $_GET["id"]; // assign your NIS value here;

    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $jk = $_POST["jk"];
    $tgl = $_POST["tgl"];
    $agama = $_POST["agama"];
    $alamat = $_POST["alamat"];

    //  $result = mysqli_query(
    //       $koneksi,
    //       "UPDATE tbl_siswa SET nama_siswa = '$nama',id_kelas='$kelas',jk = '$jk',tgl = '$tgl',agama = '$agama',alamat = '$alamat' WHERE nis=" .
    //         $_POST["nis"]
    //     );
    //     $query =
    //       "UPDATE siswa SET nama_siswa = '$nama',id_kelas='$kelas',jk = '$jk',tgl = '$tgl',agama = '$agama',alamat = '$alamat' WHERE nis=" .
    //       $_POST["nis"];
    $query = "UPDATE siswa SET nama_siswa = '$nama',id_kelas='$kelas',jk = '$jk',tgl = '$tgl',agama = '$agama',alamat = '$alamat' WHERE nis='$id'";
    $result = mysqli_query($koneksi, $query);
    //     $query =
    //       "UPDATE tblproduk SET NmProduk='$nm_produk',HargaBeli='$harga_beli',HargaJual='$harga_jual' WHERE IdProduk=" .
    //       $_POST["id_produk"];
    //     $result = mysqli_query($conn, $query);
    if ($result) {
      # code...
      echo "
        <script>alert('Data siswa Berhasil Di Ubah');window.location.href='index.php?page=siswa';</script>
        ";
    } else {
      echo "
        <script>alert('Data siswa gagal Di Ubah');window.location.href='index.php?page=siswa';</script>
        ";
    }
  }
}
if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
  // if ($_POST["edit"] === "update") {
  //     # code...
  // $nama = $_POST["nama"];
  //   $kelas = $_POST["kelas"];
  //   $jk = $_POST["jk"];
  //   $tgl = $_POST["tgl"];
  //   $agama = $_POST["agama"];
  //   $alamat = $_POST["alamat"];

  //     $result = mysqli_query(
  //       $koneksi,
  //       "UPDATE tbl_siswa SET nama_siswa = '$nama', id_kelas='$kelas', jk = '$jk', tgl = '$tgl', agama = '$agama', alamat = '$alamat' WHERE nis=" .
  //         $_POST["nis"]
  //     );
  //     echo "<script>
  //   alert('data siswa berhasil di edit');
  //   window.location.href = '../index.php?page=siswa';
  //   </script>";
  //   } else {
  //     echo "<script>alert('data siswa gagal di edit');
  //     window.location.href = '../index.php?page=siswa';
  //     </script>";
  //   }

  if ($_POST["tambah"] === "create") {
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $jk = $_POST["jk"];
    $tgl = $_POST["tgl"];
    $agama = $_POST["agama"];
    $alamat = $_POST["alamat"];

    $query1 = mysqli_query(
      $koneksi,
      "INSERT INTO siswa (nis, nama_siswa, id_kelas, jk, tgl, agama, alamat) VALUES ('$nis', '$nama', '$kelas', '$jk', '$tgl', '$agama', '$alamat')"
    );
    echo "<script>
  alert('data siswa berhasil di tambahkan');
  window.location.href = '../index.php?page=siswa';
  </script>";
  } else {
    echo "<script>alert('data siswa gagal di tambahkan');</script>";
  }
}
?>

