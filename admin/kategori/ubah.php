  <?php

    $id_kategori = $_GET['id_kategori'];

    // Mengambil data kategori berdasarkan id_kategori
    $ubah = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
    $data = mysqli_fetch_array($ubah);
    ?>
  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Ubah Kategori</div>
                      </div>
                      <form action="kategori/proses_ubah.php" method="POST">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">
                                      <div class="form-group">
                                          <label for="Nama Kategori">Nama Kategori</label>
                                          <input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" id="">
                                          <input type="text" name="nama_kategori" class="form-control" aria-describedby="emailHelp"
                                              placeholder="Masukkan Nama Kategori" value=" <?php echo $data['nama_kategori']; ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="card-action">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="?page=kategori/index" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>