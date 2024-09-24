<?php

session_start();
$_SESSION['update_success'] = '  Data Berhasil Diubah';
include "../koneksi.php";

// Mengambil data dari form
$id_wisata = $_POST['id_wisata']; // ID wisata yang akan diupdate
$id_kategori = $_POST['id_kategori'];
$judul_wisata = $_POST['judul_wisata'];
$tgl_wisata = $_POST['tgl_wisata'];
$isi_wisata = $_POST['isi_wisata'];

// Menangani upload file foto
if ($_FILES['gambar_wisata']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['gambar_wisata']['name'];
    $namaSementara = $_FILES['gambar_wisata']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

$update = mysqli_query($koneksi, "UPDATE wisata SET id_kategori='$id_kategori', 
judul_wisata='$judul_wisata', tgl_wisata='$tgl_wisata', isi_wisata='$isi_wisata', 
gambar_wisata='$namafile' WHERE id_wisata='$id_wisata'");

// Menampilkan pesan berdasarkan hasil query
if ($update) {
    echo "<script>
       window.location.href='../?page=wisata/index';
    </script>";
} else {
    echo "<script>
       window.location.href='../?page=wisata/index';
    </script>";
}
