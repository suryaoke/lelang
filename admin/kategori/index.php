 <div class="content">
     <div class="grid grid-cols-12 gap-6 mt-5">
         <div class="intro-y col-span-12 lg:col-span-12">
             <div class="intro-y box mt-5">
                 <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                     <h2 class="font-medium text-base mr-auto">
                         Data Kategori
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
                                         <th class="whitespace-nowrap">Nama</th>
                                         <th class="whitespace-nowrap">Gambar</th>
                                         <th class="whitespace-nowrap">Action</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                        while ($data =  mysqli_fetch_array($query)) {
                                        ?>
                                         <tr>
                                             <td class="whitespace-nowrap"><?php echo $no++ ?></td>
                                             <td class="whitespace-nowrap"><?php echo $data['nama_kategori'] ?></td>
                                             <td class="whitespace-nowrap" class="text-center"> <img width="100" src="../admin/uploads/<?php echo $data['foto'] ?>" alt=""></td>
                                             <td class="whitespace-nowrap">
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#update-header-footer-modal-preview-<?php echo $data['id_kategori']; ?>"
                                                     class="btn btn-primary mr-1 mb-2">
                                                     <i data-lucide="edit" class="w-4 h-4"></i>
                                                 </a>
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#delete-confirmation-modal-<?php echo $data['id_kategori']; ?>"
                                                     class="btn btn-danger mr-1 mb-2">
                                                     <i data-lucide="trash" class="w-4 h-4"></i> </a>

                                             </td>
                                         </tr>

                                         <!-- BEGIN: Modal Update -->
                                         <div id="update-header-footer-modal-preview-<?php echo $data['id_kategori']; ?>" class="modal"
                                             tabindex="-1" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                                     <div class="modal-header">
                                                         <h2 class="font-medium text-base mr-auto">Ubah Data Kategori</h2>

                                                     </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                                     <form action="kategori/proses_ubah.php" method="POST"
                                                         enctype="multipart/form-data">

                                                         <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                             <input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori']; ?>">
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Nama</label>
                                                                 <input id="modal-form-1" type="text" value="<?php echo $data['nama_kategori']; ?>"
                                                                     name="nama_kategori" class="form-control"
                                                                     placeholder="Masukkan Nama">
                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Gambar</label>
                                                                 <img width="100" src="../admin/uploads/<?php echo $data['foto'] ?>" alt="">

                                                                 <input type="file" name="foto" class="form-control"
                                                                     value="<?php echo $data['foto'] ?>">
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
                                         <div id="delete-confirmation-modal-<?php echo $data['id_kategori']; ?>" class="modal" tabindex="-1"
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
                                                             <a href="kategori/hapus.php?id_kategori=<?php echo $data['id_kategori'] ?>"
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
                     <h2 class="font-medium text-base mr-auto">Tambah Data Kategori</h2>

                 </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                 <form action="kategori/proses_tambah.php" method="POST" id="myForm"
                     enctype="multipart/form-data">

                     <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Nama</label>
                             <input id="modal-form-1" type="text" name="nama_kategori" class="form-control"
                                 placeholder="Masukkan Nama" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Gambar</label>
                             <input id="modal-form-1" type="file" name="foto" class="form-control"
                                 required>
                         </div>

                     </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                     <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                             class="btn btn-danger w-20 mr-1">Cancel</button> <button type="submit"
                             class="btn btn-primary w-20">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div> <!-- END: Modal Tambah -->
 </div>