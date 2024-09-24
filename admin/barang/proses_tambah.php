<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";

// Mengambil data dari form

$nama_barang = $_POST['nama_barang'];
$harga_awal = $_POST['harga_awal'];
$deskripsi = $_POST['deskripsi'];
$id_kategori = $_POST['id_kategori'];
$slug = str_replace('+', '-', urlencode($nama_barang));



$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


$tambah = mysqli_query($koneksi, "INSERT INTO barang 
(nama_barang, harga_awal, foto, slug, deskripsi, id_kategori) 
VALUES ('$nama_barang', '$harga_awal', '$namafile', '$slug', '$deskripsi', '$id_kategori')");

if ($tambah) {
    echo "<script>
   
    window.location.href='../?page=barang/index';
    </script>";
} else {
    echo "<script>
 
    window.location.href='../?page=barang/index';
    </script>";
}
