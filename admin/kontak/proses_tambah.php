<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";
$nama_facebook = $_POST['facebook'];
$nama_instagram = $_POST['instagram'];
$nama_notelp = $_POST['no_telp'];
$nama_alamat = $_POST['alamat'];

// Memperbaiki query dengan menambahkan kurung tutup yang hilang
$tambah = mysqli_query($koneksi, "INSERT INTO kontak (facebook, instagram, no_telp, alamat) VALUES ('$nama_facebook', '$nama_instagram','$nama_notelp', '$nama_alamat')");

if ($tambah) {
    echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
      window.location.href='../?page=kontak/index';
    </script>";
}
