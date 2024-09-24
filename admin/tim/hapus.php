<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mendapatkan id_tim dari parameter URL
$id_tim = $_GET['id_tim'];

// Membuat query untuk menghapus data berdasarkan id_tim
$hapus = mysqli_query($koneksi, "DELETE FROM tim WHERE id_tim = '$id_tim'");


if ($hapus) {
    echo "<script>
   
    window.location.href='../?page=tim/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
  
    window.location.href='../?page=tim/index';
    </script>";
}
