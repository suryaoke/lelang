  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Tambah Armada</div>
                      </div>
                      <form action="armada/proses_tambah.php" method="POST">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">
                                      <div class="form-group mb-3">
                                          <label for="">Nama </label>
                                          <input type="text" name="nama_armada" class="form-control" required>
                                      </div>

                                      <div class="form-group mb-3">
                                          <label for="">Kapasitas</label>
                                          <input name="kapasitas" class="form-control" required>
                                      </div>


                                      <div class="form-group mb-3">
                                          <label for="">Foto</label>
                                          <input type="file" name="foto" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-action">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="?page=armada/index" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>