<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";

// Mengambil data dari form
$id_kategori = $_POST['id_kategori'];
$judul_wisata = $_POST['judul_wisata'];
$tgl_wisata = $_POST['tgl_wisata'];
$isi_wisata = $_POST['isi_wisata'];
$slug = str_replace('+', '-', urlencode($judul_wisata));



$namafile = $_FILES['gambar_wisata']['name'];
$namaSementara = $_FILES['gambar_wisata']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


$tambah = mysqli_query($koneksi, "INSERT INTO wisata 
(id_kategori, judul_wisata, tgl_wisata, isi_wisata, gambar_wisata, slug) 
VALUES ('$id_kategori', '$judul_wisata', '$tgl_wisata', '$isi_wisata', '$namafile', '$slug')");

if ($tambah) {
    echo "<script>
   
    window.location.href='../?page=wisata/index';
    </script>";
} else {
    echo "<script>
 
    window.location.href='../?page=wisata/index';
    </script>";
}
