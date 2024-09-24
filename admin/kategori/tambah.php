<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Kategori</div>
                    </div>
                    <form action="kategori/proses_tambah.php" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="Nama Kategori">Nama Kategori</label>
                                        <input type="text" name="nama_kategori" class="form-control"
                                            placeholder="Masukkan Nama Kategori">
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