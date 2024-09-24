 <div class="content">
     <div class="grid grid-cols-12 gap-6 mt-5">
         <div class="intro-y col-span-12 lg:col-span-12">
             <div class="intro-y box mt-5">
                 <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                     <h2 class="font-medium text-base mr-auto">
                         Data Lelang
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
                                         <th class="whitespace-nowrap">Tanggal Lelang</th>
                                         <th class="whitespace-nowrap">Harga Awal</th>
                                         <th class="whitespace-nowrap">Harga Akhir</th>
                                         <th class="whitespace-nowrap">Pemenang</th>
                                         <th class="whitespace-nowrap">Gambar</th>
                                         <th class="whitespace-nowrap">Kategori</th>
                                         <th class="whitespace-nowrap">Status</th>
                                         <th class="whitespace-nowrap">Action</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;
                                        $querybarang = mysqli_query($koneksi, "
                                          SELECT lelang.*, barang.nama_barang, barang.harga_awal, barang.foto AS barang_foto, kategori.nama_kategori 
                                         FROM lelang 
                                         JOIN barang ON lelang.id_barang = barang.id_barang 
                                         JOIN kategori ON barang.id_kategori = kategori.id_kategori 
                                        ORDER BY id_lelang DESC");

                                        while ($data = mysqli_fetch_array($querybarang)) {
                                        ?>
                                         <tr>
                                             <td class="whitespace-nowrap"><?php echo $no++ ?></td>
                                             <td class="whitespace-nowrap"><?php echo $data['nama_barang'] ?? '-' ?></td> <!-- Default value if key is not set -->
                                             <td class="whitespace-nowrap"><?php echo date('d-m-Y', strtotime($data['tanggal_lelang'])) ?></td>
                                             <td class="whitespace-nowrap">
                                                 Rp. <?php echo number_format($data['harga_awal'] ?? 0, 0, ',', '.'); ?> <!-- Default to 0 if harga_awal is null -->
                                             </td>
                                             <td class="whitespace-nowrap">-</td>
                                             <td class="whitespace-nowrap">-</td>
                                             <td class="whitespace-nowrap" class="text-center"> <img width="100" src="../admin/uploads/<?php echo $data['barang_foto'] ?>" alt=""></td>
                                             <td class="whitespace-nowrap"> <?= $data['nama_kategori'] ?> </td>
                                             <td class="whitespace-nowrap">
                                                 <?php if ($data['status'] == '1') { ?>
                                                     Ditutup
                                                 <?php } elseif ($data['status'] == '2') { ?>
                                                     Dibuka
                                                 <?php } ?>
                                             </td>

                                             <td class="whitespace-nowrap">
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#update-header-footer-modal-preview-<?php echo $data['id_lelang']; ?>"
                                                     class="btn btn-primary mr-1 mb-2">
                                                     <i data-lucide="edit" class="w-4 h-4"></i>
                                                 </a>
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#delete-confirmation-modal-<?php echo $data['id_lelang']; ?>"
                                                     class="btn btn-danger mr-1 mb-2">
                                                     <i data-lucide="trash" class="w-4 h-4"></i> </a>

                                             </td>
                                         </tr>

                                         <!-- BEGIN: Modal Update -->
                                         <div id="update-header-footer-modal-preview-<?php echo $data['id_lelang']; ?>" class="modal"
                                             tabindex="-1" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                                     <div class="modal-header">
                                                         <h2 class="font-medium text-base mr-auto">Ubah Data Barang</h2>

                                                     </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                                     <form action="lelang/proses_ubah.php" method="POST"
                                                         enctype="multipart/form-data">

                                                         <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                             <input type="hidden" name="id_lelang" value="<?php echo $data['id_lelang']; ?>">
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Tanggal Lelang</label>
                                                                 <input id="modal-form-1" type="date" name="tanggal_lelang" class="form-control"
                                                                     placeholder="Masukkan Tanggal" value="<?php echo $data['tanggal_lelang']; ?>" required>
                                                             </div>

                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Barang</label>
                                                                 <select name="id_barang" id="" class="form-control tom-select" required>
                                                                     <?php

                                                                        $query1 = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY nama_barang ASC");
                                                                        while ($databarang1 =  mysqli_fetch_array($query1)) {
                                                                        ?>
                                                                         <option value="<?php echo $databarang1['id_barang']; ?>"
                                                                             <?php echo $databarang1['id_barang'] == $data['id_barang'] ? 'selected' : ''; ?>>
                                                                             <?php echo $databarang1['nama_barang'] ?>
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
                                         <div id="delete-confirmation-modal-<?php echo $data['id_lelang']; ?>" class="modal" tabindex="-1"
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
                                                             <a href="lelang/hapus.php?id_barang=<?php echo $data['id_barang'] ?>"
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
                 <form action="lelang/proses_tambah.php" method="POST" id="myForm"
                     enctype="multipart/form-data">

                     <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                         <input type="hidden" name="status" value="1" id="">
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Tanggal Lelang</label>
                             <input id="modal-form-1" type="date" name="tanggal_lelang" class="form-control"
                                 placeholder="Masukkan Tanggal" required>
                         </div>

                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Barang</label>
                             <select name="id_barang" id="" class="form-control tom-select" required>
                                 <?php

                                    $query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY nama_barang ASC");
                                    while ($data =  mysqli_fetch_array($query)) {
                                    ?>
                                     <option value="<?php echo $data['id_barang'] ?>"> <?php echo $data['nama_barang'] ?></option>
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