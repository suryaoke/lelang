<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mendapatkan id_kategori dari parameter URL
$id_kategori = $_GET['id_kategori'];

// Membuat query untuk menghapus data berdasarkan id_kategori
$hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

if ($hapus) {
    echo "<script>
    window.location.href='../?page=kategori/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
        window.location.href='../?page=kategori/index';
    </script>";
}
