<?php
include "../db/koneksi.php";
$id_kelas = $_GET["id"];

$querysiswa = "select * from siswa where id_kelas='$id_kelas'";
$res_siswa = mysqli_query($koneksi, $querysiswa);
$berhasil = true;
while ($data = mysqli_fetch_array($res_siswa)) {
  $nis = $data[0];
  $tgl = date("Y-m-d");
  $id_post = "ket" . $nis;
  $ket = $_POST[$id_post];
  if (
    $sql_absen = mysqli_query(
      $koneksi,
      "INSERT INTO absensi VALUES(null,'$tgl','$ket','$id_kelas','$nis')"
    )
  ) {
  } else {
    $berhasil = false;
    echo "gagal";
  }
}

if (
  $berhasil
) { ?> <script>alert('Simpan Data Berhasil')</script><?php echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php?page=absen">';} else { ?> <script>alert('Simpan Data Gagal');</script><?php }
?>
