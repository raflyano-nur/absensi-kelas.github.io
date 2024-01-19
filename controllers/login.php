<?php
session_start();
include "../db/koneksi.php";

if (isset($_POST["submit"]) === "login") {
  $Username = $_POST["nis"];
  $Password = md5($_POST["password"]);

  $query = mysqli_query(
    $koneksi,
    "SELECT * FROM tbluser nis = '$Username' AND password = '$Password'"
  );
  if ($query->num_rows() > 0) {
    $row = mysqli_fetch_array($query);
    $_SESSION["login"] = $row;
    $_SESSION["nis"] = $row["nis"];
    $_SESSION["level"] = $row["hak_akses"];
    echo "<script>
    alert('berhasil login');
    window.location.href 'index.php?page=home';
    </script>";
  } else {
    echo "<script>
    alert('gagal login');
    </script>";
  }
}
?>

