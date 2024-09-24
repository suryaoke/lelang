  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Tambah Tim</div>
                      </div>
                      <form action="tim/proses_tambah.php" method="POST" enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">

                                      <div class="form-group mb-3">
                                          <label for="">Nama </label>
                                          <input type="text" name="nama_tim" class="form-control" required>
                                      </div>

                                      <div class="form-group mb-3">
                                          <label for="">Jabatan</label>
                                          <input name="jabatan" class="form-control" required>
                                      </div>


                                      <div class="form-group mb-3">
                                          <label for="">Foto</label>
                                          <input type="file" name="foto" class="form-control" required>
                                      </div>


                                  </div>
                              </div>
                              <div class="card-action">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="?page=tim/index" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>