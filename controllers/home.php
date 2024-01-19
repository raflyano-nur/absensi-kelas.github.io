                  <!-- start tag php -->
                    <?php
                    include "db/koneksi.php";
                    $result = mysqli_query($koneksi, "SELECT * FROM siswa");
                    $result1 = mysqli_query($koneksi, "SELECT * FROM kelas");

                    // Ambil hasil data di databases
                    //$row = mysqli_fetch_assoc($result);

                    //menghitung Jumlah siswa yang ada di databases
                    $jumlahSiswa = mysqli_num_rows($result);
                    //menghitung Jumlah kelas yang ada di databases
                    $jumlahKelas = mysqli_num_rows($result1);
                    ?>
                    <!-- end tag php -->