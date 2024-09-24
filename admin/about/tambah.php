  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Tambah About</div>
                      </div>
                      <form action="about/proses_tambah.php" method="POST" enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">
                                      <div class="form-group mb-3">
                                          <label for="">Visi </label>
                                          <input type="text" name="visi" class="form-control" required>
                                      </div>

                                      <div class="form-group mb-3">
                                          <label for="">Misi</label>
                                          <input name="misi" class="form-control" required>
                                      </div>


                                      <div class="form-group mb-3">
                                          <label for="">Gambar</label>
                                          <input type="file" name="gambar_about" class="form-control" required>
                                      </div>

                                  </div>
                              </div>
                              <div class="card-action">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="?page=about/index" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>