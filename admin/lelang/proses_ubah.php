<?php

session_start();
$_SESSION['update_success'] = '  Data Berhasil Diubah';
include "../koneksi.php";

// Mendapatkan data dari form
$id_lelang = $_POST['id_lelang'];
$tanggal_lelang = $_POST['tanggal_lelang'];
$id_barang = $_POST['id_barang'];

// Membuat query untuk mengubah data kategori
$ubah = mysqli_query($koneksi, "UPDATE lelang SET tanggal_lelang = 
'$tanggal_lelang', id_barang = '$id_barang' WHERE id_lelang = '$id_lelang'");

if ($ubah) {
    echo "<script>
    window.location.href='../?page=lelang/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
    window.location.href='lelang/index';
    </script>";
}
