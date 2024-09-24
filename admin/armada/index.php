 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">Armada</h4>

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
                                     <th>Nama Armada</th>
                                     <th>Kapasitas</th>
                                     <th>Foto</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM armada ORDER BY id_armada DESC");
                                    while ($data =  mysqli_fetch_array($query)) {

                                    ?>
                                     <tr>

                                         <td><?php echo $no++ ?></td>
                                         <td> <?php echo $data['nama_armada'] ?></td>
                                         <td> <?php echo $data['kapasitas'] ?></td>
                                         <td class="text-center"> <img width="100" src="../../admin/uploads/<?php echo $data['foto'] ?>" alt=""></td>


                                         <td>
                                             <!-- Tombol untuk memunculkan modal Ubah -->
                                             <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $data['id_armada']; ?>">
                                                 <i class="fa fa-edit"></i>
                                             </button>

                                             <a href="armada/hapus.php?id_armada=<?php echo $data['id_armada'] ?>"
                                                 class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus armada ini?')">
                                                 <i class="fa fa-trash"></i></a>

                                         </td>

                                     </tr>


                                     <!-- Modal Ubah Data -->
                                     <div class="modal fade" id="ubahModal<?php echo $data['id_armada']; ?>" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="ubahModalLabel">Ubah Data Armada</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <form action="armada/proses_ubah.php" method="POST">
                                                     <div class="modal-body">
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
                                                             <img width="100" src="../admin/uploads/<?php echo $data['foto'] ?>" alt="">
                                                             <input type="hidden" name="foto_lama" value="<?php echo $data['foto'] ?>" id="">
                                                             <input type="file" name="foto" class="form-control" value="<?php echo $data['foto'] ?>">
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
                 <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Armada</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="armada/proses_tambah.php" method="POST">
                 <div class="modal-body">
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