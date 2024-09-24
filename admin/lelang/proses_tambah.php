<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";

// Mengambil data dari form
$tanggal_lelang = $_POST['tanggal_lelang'];
$id_barang = $_POST['id_barang'];
$status = $_POST['status'];

// Query to insert data
$tambah = mysqli_query($koneksi, "INSERT INTO lelang (tanggal_lelang, id_barang, status) 
VALUES ('$tanggal_lelang', '$id_barang', '$status')");

if ($tambah) {
    echo "<script>
    window.location.href='../?page=lelang/index';
    </script>";
} else {
    echo "<script>
    window.location.href='../?page=lelang/index';
    </script>";
}
