<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mendapatkan id_about dari parameter URL
$id_about = $_GET['id_about'];

// Membuat query untuk menghapus data berdasarkan id_about
$hapus = mysqli_query($koneksi, "DELETE FROM about WHERE id_about = '$id_about'");


if ($hapus) {
    echo "<script>
      window.location.href='../?page=about/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
        window.location.href='../?page=about/index';
    </script>";
}
