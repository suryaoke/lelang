<?php

// Mendapatkan id_about dari parameter URL
$id_about = $_GET['id_about'];

// Mengambil data about berdasarkan id_about
$ubah = mysqli_query($koneksi, "SELECT * FROM about WHERE id_about = '$id_about'");
$data = mysqli_fetch_array($ubah);
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ubah About</div>
                    </div>
                    <form action="about/proses_ubah.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <input type="hidden" name="id_about" value="<?php echo $data['id_about'] ?>">

                                    <div class="form-group mb-3">
                                        <label for="">Visi</label>
                                        <input type="text" name="visi" class="form-control" value="<?php echo $data['visi']; ?>">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Misi</label>
                                        <input type="text" name="misi" class="form-control" value="<?php echo $data['misi']; ?>">

                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="">Gambar_about</label>
                                        <img width="100" src="../admin/uploads/<?php echo $data['gambar_about'] ?>" alt="">
                                        <input type="hidden" name="foto_lama" value="<?php echo $data['gambar_about'] ?>" id="">
                                        <input type="file" name="gambar_about" class="form-control" value="<?php echo $data['gambar_about'] ?>">
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