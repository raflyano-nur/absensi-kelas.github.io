<style>
  label {
    text-transform: capitalize;
  }
</style>

<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-6">
      <div class="bg-light rounded h-100 p-4">
          <h6 class="mb-4 text-capitalize">form tambah data siswa</h6>
          
        <form action="controllers/tambah_data.php" method="post">
        <div class="form-floating mb-3">
          <input type="number" name="nis" class="form-control" id="floatingInput" placeholder="Masukkan nis anda">
          <label for="floatingInput">nis siswa</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan Nama anda">
          <label for="floatingInput">nama siswa</label>
        </div>
        
        <div class="form-floating mb-3">
          <select class="form-select" name="kelas" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Pilih Kelas anda</option>
            <option value="1">XI RPL 1</option>
            <option value="2">XI RPL 2</option>
          </select>
          <label for="floatingSelect">Kelas siswa</label>
        </div>
        
        <div class="form-floating mb-3">
          <select class="form-select" name="jk" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Pilihlah Jenis Kelamin anda</option>
            <option value="L">L</option>
            <option value="P">P</option>
          </select>
          <label for="floatingSelect">Jenis Kelamin</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="date" name="tgl" class="form-control" id="floatingInput">
          <label for="floatingInput">Tanggal Lahir</label>
        </div>
        
        <div class="form-floating mb-3">
          <select class="form-select" name="agama" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Pilihlah Agama anda yang di anut</option>
            <option value="islam">islam</option>
            <option value="kristen">kristen</option>
          </select>
          <label for="floatingSelect">Agama</label>
        </div>
        
        <div class="form-floating mb-3">
          <textarea class="form-control" name="alamat" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
          <label for="floatingTextarea">Alamat</label>
        </div>
        
        <div class="form-floating text-capitalize">
        <button type="submit" name="tambah" value="create" class="btn btn-success"><i class="fa fa-plus me-1"></i>Tambah</button>
        <button type="close" class="btn btn-danger"><i class="fa fa-plus me-1 text-dark fw-bold"></i><a href="index.php?page=siswa" class="dropdown text-dark">keluar</a></button>
        </div>
        
        </form>
      </div>
    </div>
  </div>
</div>