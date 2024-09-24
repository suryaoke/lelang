<?php

// Mendapatkan id_armada dari parameter URL
$id_armada = $_GET['id_armada'];

// Mengambil data armada berdasarkan id_armada
$ubah = mysqli_query($koneksi, "SELECT * FROM armada WHERE id_armada = '$id_armada'");
$data = mysqli_fetch_array($ubah);
?>


<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ubah Armada</div>
                    </div>
                    <form action="armada/proses_ubah.php" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <input type="hidden" name="id_armada" value="<?php echo $data['id_armada'] ?>">

                                    <div class="form-group mb-3">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama_armada" class="form-control" value="<?php echo $data['nama_armada']; ?>">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Kapasitas</label>
                                        <input type="text" name="kapasitas" class="form-control" value="<?php echo $data['kapasitas']; ?>">

                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="">Foto</label>
                                        <img width="100" src="../uploads/<?php echo $data['foto'] ?>" alt="">
                                        <input type="hidden" name="foto_lama" value="<?php echo $data['foto'] ?>" id="">
                                        <input type="file" name="foto" class="form-control" value="<?php echo $data['foto'] ?>">
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