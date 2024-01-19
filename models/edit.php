<style>
  label {
    text-transform: capitalize;
  }
</style>

<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-6">
      <div class="bg-light rounded h-100 p-4">
          <h6 class="mb-4 text-capitalize">form edit data siswa</h6>
          <!-- start tag php -->
          <?php include "controllers/edit.php"; ?>
          <!-- end tag php -->
        <form action="controllers/tambah_data.php" method="post">
        <div class="form-floating mb-3">
          <input type="hidden" name="nis" class="form-control" id="floatingInput" placeholder="Masukkan nis anda" value="<?= $row[
            "nis"
          ] ?>">
          <input type="number" name="jsk" value="<?= $row[
            "nis"
          ] ?>" class="form-control" id="floatingInput" disabled>
          <label for="floatingInput">nis siswa</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" name="nama" value="<?= $row[
            "nama_siswa"
          ] ?>" class="form-control" id="floatingInput">
          <label for="floatingInput">nama siswa</label>
        </div>
        
        <div class="form-floating mb-3">
          <select class="form-select" name="kelas" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Pilih Kelas anda</option>
            <option value="4" <?php if ($row["id_kelas"] == "1") {
              echo "selected='selected'";
            } ?> >XI RPL 1</option>
            <option value="2" <?php if ($row["id_kelas"] == "2") {
              echo "selected='selected'";
            } ?> >XI RPL 2</option>
          </select>
          <label for="floatingSelect">Kelas siswa</label>
        </div>
        
        <div class="form-floating mb-3">
          <select name="jk" class="form-select">
            <option selected>Pilihlah Jenis Kelamin anda</option>
            <option value="<?= $row["jk"] ?>" <?php if ($row["jk"] == "L") {
  echo "selected='selected'";
} ?> >Laki-Laki</option>
            <option value="P"  <?php if ($row["jk"] == "P") {
              echo "selected='selected'";
            } ?> >Perempuan</option>
          </select>
          <label for="floatingSelect">Jenis Kelamin</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="date" value="<?= $row[
            "tgl"
          ] ?>"  name="tgl" class="form-control" id="floatingInput">
          <label for="floatingInput">Tanggal Lahir</label>
        </div>
        
        <div class="form-floating mb-3">
          <select class="form-select" name="agama" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Pilihlah Agama anda yang di anut</option>
            <option value="islam" <?php if ($row["agama"] == "islam") {
              echo "selected='selected'";
            } ?> >islam</option>
            <option value="kristen" <?php if ($row["agama"] == "kristen") {
              echo "selected='selected'";
            } ?> >kristen</option>
          </select>
          <label for="floatingSelect">Agama</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="alamat" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" value="<?= $row[
            "alamat"
          ] ?>"  ></textarea>
          <label for="floatingTextarea">Alamat</label>
        </div>
        
        <div class="form-floating text-capitalize">
        <button type="submit" name="edit" value="update" class="btn btn-warning"><i class="fa fa-plus me-1"></i>edit</button>
        <button type="close" class="btn btn-danger"><i class="fa fa-plus me-1 text-dark fw-bold"></i><a href="index.php?page=siswa" class="dropdown text-dark">keluar</a></button>
        </div>
        
        </form>
      </div>
    </div>
  </div>
</div>