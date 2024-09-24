<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mendapatkan id_kontak dari parameter URL
$id_kontak = $_GET['id_kontak'];

// Membuat query untuk menghapus data berdasarkan id_kontak
$hapus = mysqli_query($koneksi, "DELETE FROM kontak WHERE id_kontak = '$id_kontak'");


if ($hapus) {
    echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
}
