<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mendapatkan id_kategori dari parameter URL
$id_barang = $_GET['id_barang'];

// Membuat query untuk menghapus data berdasarkan id_kategori
$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id_barang'");

if ($hapus) {
    echo "<script>
    window.location.href='../?page=barang/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
    window.location.href='../?page=barang/index';
    </script>";
}
