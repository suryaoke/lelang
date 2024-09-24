  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Tambah Wisata</div>
                      </div>
                      <form action="wisata/proses_tambah.php" method="POST" enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">

                                      <div class="form-group mb-3">
                                          <label for="">Nama Kategori</label>
                                          <select name="id_kategori" id="" class="form-control">
                                              <?php

                                                $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                                while ($data =  mysqli_fetch_array($query)) {
                                                ?>
                                                  <option value="<?php echo $data['id_kategori'] ?>"> <?php echo $data['nama_kategori'] ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>

                                      <div class="form-group mb-3">
                                          <label for="">Judul Wisata</label>
                                          <input type="text" name="judul_wisata" class="form-control" required>
                                      </div>
                                      <div class="form-group mb-3">
                                          <label for="">Tanggal Wisata</label>
                                          <input type="date" name="tgl_wisata" class="form-control" required>
                                      </div>

                                      <div class="form-group mb-3">
                                          <label for="">Isi Wisata</label>
                                          <textarea name="isi_wisata" class="form-control" required></textarea>
                                      </div>


                                      <div class="form-group mb-3">
                                          <label for="">Gambar Wisata</label>
                                          <input type="file" name="gambar_wisata" class="form-control" required>
                                      </div>

                                  </div>
                              </div>
                              <div class="card-action">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="?page=wisata/index" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>