                  <!-- start tag php -->
                    <?php
               //      include "db/koneksi.php";
//                     $query = "SELECT * FROM siswa WHERE nis";
//                     $result = mysqli_query($koneksi, $query);
//                     $row = mysqli_fetch_array($result);

                    include "db/koneksi.php";

                    // Assuming $nis contains the NIS value you want to retrieve
                    $nis = $_GET["id"]; // assign your NIS value here;

                    $query = "SELECT * FROM siswa WHERE nis = '$nis'";
                    $result = mysqli_query($koneksi, $query);

                    if ($result) {
                      $row = mysqli_fetch_array($result);
                      // Rest of your code handling $row
                    } else {
                      // Handle query execution error
                      echo "Error executing query: " . mysqli_error($koneksi);
                    }
                    ?>
                    <!-- end tag php -->