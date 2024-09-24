<?php

session_start();
include "../koneksi.php";

// Mengambil data dari form
$id_barang = $_POST['id_barang']; // Assuming you have an 'id_barang' to identify the record to update
$nama_barang = $_POST['nama_barang'];
$harga_awal = $_POST['harga_awal'];
$deskripsi = $_POST['deskripsi'];
$id_kategori = $_POST['id_kategori'];
$slug = str_replace('+', '-', urlencode($nama_barang));

// Handle file upload
$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];

// Check if the user uploaded a new file or not
if ($namafile != "") {
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);

    // Update with the new image
    $query = "UPDATE barang SET 
              nama_barang = '$nama_barang',
               harga_awal = '$harga_awal',
              foto = '$namafile', 
              slug = '$slug',
              deskripsi = '$deskripsi',
              id_kategori = '$id_kategori' 
              WHERE id_barang = '$id_barang'";
} else {
    // Update without changing the image
    $query = "UPDATE barang SET 
              nama_barang = '$nama_barang',
             
              harga_awal = '$harga_awal',
              slug = '$slug',
              deskripsi = '$deskripsi',
              id_kategori = '$id_kategori' 
              WHERE id_barang = '$id_barang'";
}

// Execute the query
$ubah = mysqli_query($koneksi, $query);

if ($ubah) {
    $_SESSION['save_success'] = 'Data Berhasil Diubah';
    echo "<script>
        window.location.href='../?page=barang/index';
    </script>";
} else {
    // Display error message if update fails
    echo "Error: " . mysqli_error($koneksi);
}
