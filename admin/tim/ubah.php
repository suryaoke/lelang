<?php

// Mendapatkan id_tim dari parameter URL
$id_tim = $_GET['id_tim'];

// Mengambil data tim berdasarkan id_tim
$ubah = mysqli_query($koneksi, "SELECT * FROM tim WHERE id_tim = '$id_tim'");
$data = mysqli_fetch_array($ubah);
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ubah Tim</div>
                    </div>
                    <form action="tim/proses_ubah.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">

                                    <input type="hidden" name="id_tim" value="<?php echo $data['id_tim'] ?>">

                                    <div class="form-group mb-3">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama_tim" class="form-control" value="<?php echo $data['nama_tim']; ?>">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan']; ?>">

                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="">Foto</label>
                                        <img width="100" src="../admin/uploads/<?php echo $data['foto'] ?>" alt="">
                                        <input type="hidden" name="foto_lama" value="<?php echo $data['foto'] ?>" id="">
                                        <input type="file" name="foto" class="form-control" value="<?php echo $data['foto'] ?>">
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