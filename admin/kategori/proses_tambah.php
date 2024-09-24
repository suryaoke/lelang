<?php
session_start();
$_SESSION['save_success'] = 'Data Berhasil Ditambahkan';
include "../koneksi.php";

// Mendapatkan data dari form
$nama_kategori = $_POST['nama_kategori'];
$slug = str_replace('+', '-', urlencode($nama_kategori));

$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);

// Membuat query untuk menambahkan data kategori
$tambah = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori, foto, slug) VALUES ('$nama_kategori', '$namafile', '$slug')");

if ($tambah) {
    echo "<script>
        window.location.href='../?page=kategori/index';
    </script>";
} else {
    echo "<script>
      window.location.href='../?page=kategori/index';
    </script>";
}
