<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mendapatkan id_kategori dari parameter URL
$id_wisata = $_GET['id_wisata'];

// Membuat query untuk menghapus data berdasarkan id_kategori
$hapus = mysqli_query($koneksi, "DELETE FROM wisata WHERE id_wisata = '$id_wisata'");

if ($hapus) {
    echo "<script>
    window.location.href='../?page=wisata/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
    window.location.href='../?page=wisata/index';
    </script>";
}
