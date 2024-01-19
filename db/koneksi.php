<?php
$koneksi = new mysqli("localhost", "id21544354_absen_kelas","Raflyano'17", "id21544354_absen_kelas");

// Periksa koneksi
if (!$koneksi) {
  die("Connection Failed: " . mysqli_connect_error());
}

$url = "https://absensi-kelas75.000webhostapp.com/abskel/";

?>
