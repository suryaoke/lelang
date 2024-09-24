<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Wisata</h4>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="basic-datatables"
                            class="display table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Judul Wisata</th>
                                    <th>Tanggal Wisata</th>
                                    <th>Isi Wisata</th>
                                    <th>Gambar Wisata</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM wisata 
                                 JOIN kategori ON wisata.id_kategori=kategori.id_kategori
                                 ORDER BY id_wisata DESC");
                                while ($data =  mysqli_fetch_array($query)) {
                                ?>
                                    <tr>

                                        <td><?php echo $no++ ?></td>
                                        <td> <?php echo $data['nama_kategori'] ?></td>
                                        <td> <?php echo $data['judul_wisata'] ?></td>
                                        <td> <?php echo date('d-m-Y', strtotime($data['tgl_wisata'])) ?></td>
                                        <td> <?php echo substr($data['isi_wisata'], 0, 50)  ?></td>
                                        <td class="text-center"> <img width="100" src="../admin/uploads/<?php echo $data['gambar_wisata'] ?>" alt=""></td>

                                        <td>

                                            <!-- Tombol untuk memunculkan modal Ubah -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $data['id_wisata']; ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a href="wisata/hapus.php?id_wisata=<?php echo $data['id_wisata'] ?>"
                                                class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus wisata ini?')">
                                                <i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>

                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="ubahModal<?php echo $data['id_wisata']; ?>" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ubahModalLabel">Ubah Data Wisata</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="wisata/proses_ubah.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-12">
                                                                <input type="hidden" name="id_wisata" value="<?php echo $data['id_wisata'] ?>">

                                                                <div class="form-group mb-3">
                                                                    <label for="">Nama Kategori</label>
                                                                    <select name="id_kategori" id="" class="form-control">
                                                                        <?php
                                                                        $querykategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                                                        while ($datakategori =  mysqli_fetch_array($querykategori)) {
                                                                        ?>

                                                                            <option value="<?php echo $datakategori['id_kategori']; ?>"
                                                                                <?php echo $datakategori['id_kategori'] == $data['id_kategori'] ? 'selected' : ''; ?>>
                                                                                <?php echo $datakategori['nama_kategori'] ?>
                                                                            </option>
                                                                        <?php } ?>

                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Judul Wisata</label>
                                                                    <input type="text" name="judul_wisata" class="form-control" value="<?php echo $data['judul_wisata']; ?>">

                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="">Tanggal Wisata</label>
                                                                    <input type="date" name="tgl_wisata" class="form-control" value="<?php echo $data['tgl_wisata'] ?>" required>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Isi Wisata</label>
                                                                    <textarea id="summernote" name="isi_wisata" class="form-control" required><?php echo $data['isi_wisata'] ?></textarea>
                                                                </div>


                                                                <div class="form-group mb-3">
                                                                    <label for="">Gambar Wisata</label>
                                                                    <img width="100" src="../admin/uploads/<?php echo $data['gambar_wisata'] ?>" alt="">
                                                                    <input type="hidden" name="foto_lama" value="<?php echo $data['gambar_wisata'] ?>">
                                                                    <input type="file" name="gambar_wisata" class="form-control"
                                                                        value="<?php echo $data['gambar_wisata'] ?>">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Tambah -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="wisata/proses_tambah.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

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
                                    <textarea id="summernote" name="isi_wisata" class="form-control" required></textarea>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Gambar Wisata</label>
                                    <input type="file" name="gambar_wisata" class="form-control" required>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if ($_SESSION['save_success']) :
?>

    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?= $_SESSION['save_success'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>

<?php
    unset($_SESSION['save_success']);
endif; ?>


<?php
if ($_SESSION['update_success']) :
?>

    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?= $_SESSION['update_success'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>

<?php
    unset($_SESSION['update_success']);
endif; ?>


<?php
if ($_SESSION['delete_success']) :
?>

    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?= $_SESSION['delete_success'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>

<?php
    unset($_SESSION['delete_success']);
endif; ?>