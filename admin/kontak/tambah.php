  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Tambah Kontak</div>
                      </div>
                      <form action="kontak/proses_tambah.php" method="POST">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">

                                      <div class="form-group">
                                          <label for="">Facebook</label>
                                          <input type="text" name="facebook" class="form-control" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="">Instagram</label>
                                          <input type="text" name="instagram" class="form-control" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="">No Hp</label>
                                          <input type="number" name="no_telp" class="form-control" required>
                                      </div>

                                      <div class="form-group">
                                          <label for="">Alamat</label>
                                          <textarea name="alamat" class="form-control" required></textarea>
                                      </div>


                                  </div>
                              </div>
                              <div class="card-action">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="?page=kontak/index" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>