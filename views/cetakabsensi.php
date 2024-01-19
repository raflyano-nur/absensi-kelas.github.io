<?php
//koneksi ke FPDF
require_once "../assets/fpdf/fpdf.php";
//akhir koneksi ke FPDF

//koneksi ke database
require_once "../db/koneksi.php";
//akhir koneksi ke database
$result = mysqli_query($koneksi, "SELECT * FROM users");
$row = mysqli_fetch_array($result);
$id_user = $row["id_user"];

// $query1 = "SELECT * FROM siswa JOIN absensi ON siswa.id_kelas=absensi.id_kelas";
// $result1 = $koneksi->query($query1);
// $row1 = $result1->fetch_assoc();

// Buat class PDF dengan turunan FPDF

class PDF extends FPDF
{
  private $kelas;

  // Function to set the class name
  public function setKelas($kelas)
  {
    $this->kelas = $kelas;
  }

  function Header()
  {
    $judul = "Laporan Absensi";
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_waktu = date("d-m-Y H:i:s"); // You can customize the date/time format

    // Add title
    $this->SetFont("Arial", "B", 12);
    $this->Cell(0, 10, $judul, 0, 1, "C");

    // Add class name
    //     if (!empty($this->kelas)) {
    //       $this->Cell(0, 10, "Kelas: " . $this->kelas, 0, 1, "C");
    //     }

    // Add date and time
    $this->SetFont("Arial", "", 10);
    $this->Cell(0, 10, "Tanggal dan Waktu: " . $tanggal_waktu, 0, 1, "C");

    $this->Ln(10);
  }

  function Footer()
  {
    // Tambahkan footer sesuai kebutuhan
    $this->SetY(-15);
    $this->SetFont("Arial", "I", 8);
    $this->Cell(0, 10, "Halaman " . $this->PageNo(), 0, 0, "C");
  }
}

$pdf = new PDF("L", "mm", "A4");
//$pdf = new FPDF("L", "mm", "A4");
// $id_kelas = $_GET["kelas"]; // Make sure to sanitize or validate this input to prevent SQL injection
// $sql = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
// $data = $koneksi->query($sql);
// $row1 = $data->fetch_assoc();
// $nm_kls = $row1["nama_kelas"];
//$pdf->setKelas("Nama Kelas:" . $id_kelas); // Set the actual class name here
// Tambahkan halaman
$pdf->AddPage();

// Tambahkan isi laporan
$pdf->SetFont("Arial", "", 12);

// Query untuk mengambil data absensi dari database
//$query = "SELECT nama, tanggal, keterangan FROM absensi";
//$query = "SELECT *  FROM siswa JOIN absensi ON siswa.nis=absensi.nis";
//$query = "SELECT DISTINCT(jadwal) AS jadwal FROM absensi WHERE id_kelas='$idkelas'";

// ini udah benar sqlnya
// $query = "SELECT * FROM absensi JOIN siswa ON absensi.nis = siswa.nis";
// $result = $koneksi->query($query);
$id_kelas = $_GET["kelas"]; // Make sure to sanitize or validate this input to prevent SQL injection
$query = "SELECT absensi.*, siswa.*, kelas.* FROM absensi
          JOIN siswa ON absensi.nis = siswa.nis
          JOIN kelas ON absensi.id_kelas = kelas.id_kelas WHERE kelas.id_kelas = $id_kelas";
$result = $koneksi->query($query);
// Tampilkan data dalam bentuk tabel
if ($result->num_rows > 0) {
  // Header tabel
  $pdf->SetFont("Arial", "", "12");
  $pdf->SetFillColor(128, 0, 0);
  $pdf->SetTextColor(255);
  $pdf->SetDrawColor(20, 10, 0);

  $pdf->Cell(25, 5, "NO", 1, "0", "C", true);
  $pdf->Cell(40, 5, "NIS", 1, "0", "C", true);
  $pdf->Cell(60, 5, "NAMA", 1, "0", "C", true);
  $pdf->Cell(30, 5, "KELAS", 1, "0", "C", true);
  $pdf->Cell(40, 5, "TANGGAL ABSENSI", 1, "0", "C", true);
  $pdf->Cell(40, 5, "KETERANGAN", 1, "0", "C", true);
  $pdf->Ln();

  // Data absensi
  $i = 1;
  $pdf->SetFillColor(224, 235, 255);
  $pdf->SetTextColor(0);
  $pdf->SetFont("");
  while ($row = $result->fetch_assoc()) {
    $nis = $row["nis"];
    $nama = $row["nama_siswa"];
    $nm_kls = $row["nama_kelas"];
    $tgl = $row["jadwal"];
    $ket = $row["keterangan"];

    $pdf->Cell(25, 5, $i++, 1, "0", "C", true);
    $pdf->Cell(40, 5, $nis, 1, "0", "C", true);
    $pdf->Cell(60, 5, $nama, 1, "0", "C", true);
    $pdf->Cell(30, 5, $nm_kls, 1, "0", "C", true);
    $pdf->Cell(40, 5, $tgl, 1, "0", "C", true);
    $pdf->Cell(40, 5, $ket, 1, "0", "C", true);
    $pdf->Ln();
  }
} else {
  $pdf->Cell(0, 10, "Tidak ada data absensi.", 0, 1, "C");
}

// Menyimpan output ke direktori unduhan
// $pdfPath = "../pdf/laporan_absensi.pdf";
// $pdf->Output($pdfPath, "F");
$nm_pdf = "<script>prompt('masukkan nama pdf: ');</script>";
$pdf->Output("/storage/emulated/0/xampp/htdocs/abskel/pdf/$nm_pdf.pdf", "F");

echo "<script>
 window.location.href = 'rekapabsen.php?kelas=$id_kelas';
 alert('berhasil di download dan jadi file pdf');
 </script>";

#sertakan library FPDF dan bentuk objek
// $pdf = new FPDF("P", "mm", "A4");
// $pdf->AddPage();
// #setting judul laporan dan header tabel
// $judul = "LAPORAN ABSENSI";
//
// #tampilkan judul laporan
// $pdf->SetFont("Arial", "B", "14");
// $pdf->Cell(0, 20, $judul, "0", 1, "C");
// #ambil data masukkan ke header
//  $query = "SELECT DISTINCT(jadwal) AS jadwal FROM absensi WHERE id_kelas='$idkelas'";
//  $sql = mysqli_query($koneksi, $query);
//  $header = [];
//  while ($row = mysqli_fetch_assoc($sql)) {
#buat header tabel
//    array_push($header, $row);
//  }
// $pdf->SetFont("Arial", "", "12");
// $pdf->SetFillColor(128, 0, 0);
// $pdf->SetTextColor(255);
// $pdf->SetDrawColor(20, 10, 0);
//
// $pdf->Cell(50, 5, "NO", 1, "0", "C", true);
// $pdf->Cell(50, 5, "NIS", 1, "0", "C", true);
// $pdf->Cell(50, 5, "NAMA", 1, "0", "C", true);
// $pdf->Cell(50, 5, "KETERANGAN", 1, "0", "C", true);
//
// # isi table
// $pdf->SetFillColor(224, 235, 255);
// $pdf->SetTextColor(0);
// $pdf->SetFont("");
// $i = 1;
// $id_kelas = $_GET["kelas"];
// $sql = "SELECT * FROM siswa WHERE id_kelas='$id_kelas'";
// $query = mysqli_query($koneksi, $sql);
// $i = 1;
// while ($data = mysqli_fetch_array($query)) {
//   $nis = $data["nis"];
//   $nama = $data["nama_siswa"];
//   $pdf->Cell(15, 5, $i++, 1, "0", "C", true);
//   $pdf->Cell(25, 5, $nis, 1, "0", "C", true);
//   $pdf->Cell(50, 5, $nama, 1, "0", "C", true);
//   //$pdf->Cell(50, 5, $ket, 1, "0", "C", true);
//   //   $sqla = "SELECT * FROM absensi WHERE nis='$nis'";
//   //   $querya = mysqli_query($koneksi, $sqla);
//   //   while ($data2 = mysqli_fetch_array($querya)) {
//   //     $ket = $data2["keterangan"];
//   //     $pdf->Cell(15, 5, $i++, 1, "0", "C", true);
//   //     $pdf->Cell(25, 5, $nis, 1, "0", "C", true);
//   //     $pdf->Cell(50, 5, $nama, 1, "0", "C", true);
//   //     $pdf->Cell(50, 5, $ket, 1, "0", "C", true);
//   //}
// }
//
// #ambil data masukkan ke nama
//  $query = "SELECT DISTINCT(nis) AS nis FROM absensi WHERE id_kelas='$idkelas'";
//  $sql = mysqli_query($koneksi, $query);
//  $data = [];
//  while ($row = mysqli_fetch_assoc($sql)) {
//    array_push($data, $row);
//  }
//
//  #tampilkan data tabelnya
//  $pdf->SetFillColor(224, 235, 255);
//  $pdf->SetTextColor(0);
//  $pdf->SetFont("");
//  $fill = false;
//  foreach ($data as $baris) {
//    $i = 0;
//    $j = 0;
//    foreach ($baris as $cell) {
//      $pdf->Cell(50, 5, $baris["nis"], 1, "0", "C", $fill);
//      $pdf->Cell(50, 5, $baris["nama_siswa"], 1, "0", "C", $fill);
//      #$pdf->Cell(5, 5, 's', 1, '0', 'C', $fill);
//      #dari sini
//      $nis = $baris["nis"];
//      $queryisi = "SELECT LEFT(keterangan,1) AS keterangan FROM absensi WHERE nis='$nis'";
//      $sqlisi = mysqli_query($koneksi, $queryisi);
//      while ($row = mysqli_fetch_assoc($sqlisi)) {
//        $pdf->Cell(5, 5, $row["keterangan"], 1, "0", "C", $fill);
//      }
//      #sampai sini
//      $i++;
//    }
//    $fill = !$fill;
// $pdf->Ln();
//  }

#output file PDF

//$pdf->Output();

?>
