<?php

// Mendapatkan id_kontak dari parameter URL
$id_kontak = $_GET['id_kontak'];

// Mengambil data kontak berdasarkan id_kontak
$ubah = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id_kontak = '$id_kontak'");
$data = mysqli_fetch_array($ubah);
?>

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ubah Kontak</div>
                    </div>
                    <form action="kontak/proses_ubah.php" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">

                                    <input type="hidden" name="id_kontak" value="<?php echo $data['id_kontak']; ?>">

                                    <div class="form-group">
                                        <label for="">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" value="<?php echo $data['facebook']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" value="<?php echo $data['instagram']; ?>" required>

                                    </div>

                                    <div class="form-group">
                                        <label for="">No Hp</label>
                                        <input type="text" class="form-control" name="no_telp" value="<?php echo $data['no_telp']; ?>" required>

                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea class="form-control" name="alamat" required><?php echo $data['alamat']; ?></textarea>

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