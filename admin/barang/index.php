 <div class="content">
     <div class="grid grid-cols-12 gap-6 mt-5">
         <div class="intro-y col-span-12 lg:col-span-12">
             <div class="intro-y box mt-5">
                 <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                     <h2 class="font-medium text-base mr-auto">
                         Data Barang
                     </h2>
                     <a data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                         class="btn btn-primary shadow-md mr-2">Tambah Data</a>
                 </div>
                 <div class="p-5" id="striped-rows-table">
                     <div class="preview">
                         <div class="overflow-x-auto">
                             <table id="datatable" class="table table-striped">
                                 <thead>
                                     <tr>
                                         <th class="whitespace-nowrap">No</th>
                                         <th class="whitespace-nowrap">Nama Barang</th>
                                         <th class="whitespace-nowrap">Harga Awal</th>
                                         <th class="whitespace-nowrap">Gambar</th>
                                         <th class="whitespace-nowrap">Deskripsi</th>
                                         <th class="whitespace-nowrap">Kategori</th>
                                         <th class="whitespace-nowrap">Action</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;
                                        $querybarang = mysqli_query($koneksi, "SELECT barang.*, kategori.nama_kategori, barang.foto AS barang_foto FROM barang 
                                        JOIN kategori ON barang.id_kategori = kategori.id_kategori
                                        ORDER BY barang.nama_barang ASC");

                                        while ($data = mysqli_fetch_array($querybarang)) {
                                        ?>
                                         <tr>
                                             <td class="whitespace-nowrap"><?php echo $no++ ?></td>
                                             <td class="whitespace-nowrap"><?php echo $data['nama_barang'] ?></td>
                                             <td class="whitespace-nowrap">Rp. <?php echo number_format($data['harga_awal'], 0, ',', '.'); ?></td>
                                             <td class="whitespace-nowrap" class="text-center"> <img width="100" src="../admin/uploads/<?php echo $data['barang_foto'] ?>" alt=""></td>
                                             <td class="whitespace-nowrap"><?php echo substr($data['deskripsi'], 0, 50) ?></td>
                                             <td class="whitespace-nowrap"><?php echo $data['nama_kategori'] ?? 'N/A'; ?></td>
                                             <td class="whitespace-nowrap">
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#update-header-footer-modal-preview-<?php echo $data['id_barang']; ?>"
                                                     class="btn btn-primary mr-1 mb-2">
                                                     <i data-lucide="edit" class="w-4 h-4"></i>
                                                 </a>
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#delete-confirmation-modal-<?php echo $data['id_barang']; ?>"
                                                     class="btn btn-danger mr-1 mb-2">
                                                     <i data-lucide="trash" class="w-4 h-4"></i> </a>

                                             </td>
                                         </tr>

                                         <!-- BEGIN: Modal Update -->
                                         <div id="update-header-footer-modal-preview-<?php echo $data['id_barang']; ?>" class="modal"
                                             tabindex="-1" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                                     <div class="modal-header">
                                                         <h2 class="font-medium text-base mr-auto">Ubah Data Barang</h2>

                                                     </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                                     <form action="barang/proses_ubah.php" method="POST"
                                                         enctype="multipart/form-data">

                                                         <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                             <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Nama</label>
                                                                 <input id="modal-form-1" type="text" name="nama_barang" class="form-control"
                                                                     placeholder="Masukkan Nama" value="<?php echo $data['nama_barang']; ?>" required>
                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Harga Awal</label>
                                                                 <input id="modal-form-1" type="number" name="harga_awal" class="form-control"
                                                                     placeholder="Masukkan Harga Awal" value="<?php echo $data['harga_awal']; ?>" required>
                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Gambar</label>
                                                                 <img width="100" src="../admin/uploads/<?php echo $data['foto'] ?>" alt="">

                                                                 <input type="file" name="foto" class="form-control"
                                                                     value="<?php echo $data['foto'] ?>">
                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Deskripsi</label>
                                                                 <textarea name="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" id="" required><?php echo $data['deskripsi']; ?></textarea>

                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Kategori</label>
                                                                 <select name="id_kategori" id="" class="form-control tom-select" required>
                                                                     <?php

                                                                        $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                                                                        while ($datakategori =  mysqli_fetch_array($query)) {
                                                                        ?>
                                                                         <option value="<?php echo $datakategori['id_kategori']; ?>"
                                                                             <?php echo $datakategori['id_kategori'] == $data['id_kategori'] ? 'selected' : ''; ?>>
                                                                             <?php echo $datakategori['nama_kategori'] ?>
                                                                         </option>
                                                                     <?php } ?>
                                                                 </select>
                                                             </div>

                                                         </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                                                         <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                                                                 class="btn btn-danger w-20 mr-1">Cancel</button> <button
                                                                 type="submit" class="btn btn-primary w-20">Save</button>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div> <!-- END: Modal Update -->

                                         <!-- BEGIN: Delete Confirmation Modal -->
                                         <div id="delete-confirmation-modal-<?php echo $data['id_barang']; ?>" class="modal" tabindex="-1"
                                             aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-body p-0">
                                                         <div class="p-5 text-center">
                                                             <i data-lucide="x-circle"
                                                                 class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                             <div class="text-3xl mt-5">Are you sure?</div>
                                                             <div class="text-slate-500 mt-2">
                                                                 Do you really want to delete these records?
                                                                 <br>
                                                                 This process cannot be undone.
                                                             </div>
                                                         </div>
                                                         <div class="px-5 pb-8 text-center">
                                                             <button type="button" data-tw-dismiss="modal"
                                                                 class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                             <a href="barang/hapus.php?id_barang=<?php echo $data['id_barang'] ?>"
                                                                 class="btn btn-danger w-24">Delete</a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- END: Delete Confirmation Modal -->

                                     <?php } ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>

     <!-- BEGIN: Modal Tambah -->
     <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content"> <!-- BEGIN: Modal Header -->
                 <div class="modal-header">
                     <h2 class="font-medium text-base mr-auto">Tambah Data Barang</h2>

                 </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                 <form action="barang/proses_tambah.php" method="POST" id="myForm"
                     enctype="multipart/form-data">

                     <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Nama</label>
                             <input id="modal-form-1" type="text" name="nama_barang" class="form-control"
                                 placeholder="Masukkan Nama" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Harga Awal</label>
                             <input id="modal-form-1" type="number" name="harga_awal" class="form-control"
                                 placeholder="Masukkan Harga Awal" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Gambar</label>
                             <input id="modal-form-1" type="file" name="foto" class="form-control"
                                 required>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Deskripsi</label>
                             <textarea name="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" id="" required></textarea>

                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Kategori</label>
                             <select name="id_kategori" id="" class="form-control tom-select" required>
                                 <?php

                                    $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                                    while ($data =  mysqli_fetch_array($query)) {
                                    ?>
                                     <option value="<?php echo $data['id_kategori'] ?>"> <?php echo $data['nama_kategori'] ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                     </div>
                     <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                             class="btn btn-danger w-20 mr-1">Cancel</button> <button type="submit"
                             class="btn btn-primary w-20">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div> <!-- END: Modal Tambah -->
 </div>