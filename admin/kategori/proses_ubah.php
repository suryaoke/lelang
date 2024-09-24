<?php
session_start();
$_SESSION['update_success'] = 'Data Berhasil Diubah';
include "../koneksi.php";

// Mendapatkan data dari form
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];
$slug = str_replace('+', '-', urlencode($nama_kategori));

$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];

if ($namafile != "") {
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);

    // Membuat query untuk mengubah data kategori
    $ubah = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = 
    '$nama_kategori', foto = '$namafile', slug = '$slug' WHERE id_kategori = '$id_kategori'");
} else {
    $ubah = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = 
    '$nama_kategori', slug = '$slug' WHERE id_kategori = '$id_kategori'");
}

if ($ubah) {
    echo "<script>
    window.location.href='../?page=kategori/index';
    </script>";
} else {
    echo "<script>
    window.location.href='kategori/index';
    </script>";
}
