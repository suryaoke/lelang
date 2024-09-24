<?php

session_start();
$_SESSION['update_success'] = '  Data Berhasil Diubah';
include "../koneksi.php";

// Mengambil data dari form
$id_about = $_POST['id_about']; // ID about yang akan diupdate
$visi = $_POST['visi'];
$misi = $_POST['misi'];

// Menangani upload file gambar_about
if ($_FILES['gambar_about']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['gambar_about']['name'];
    $namaSementara = $_FILES['gambar_about']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Melakukan query update ke database
$update = mysqli_query($koneksi, "UPDATE about SET visi='$visi', misi='$misi',  gambar_about='$namafile' WHERE id_about='$id_about'");


// Menampilkan pesan berdasarkan hasil query
if ($update) {
    echo "<script>
      window.location.href='../?page=about/index';
    </script>";
} else {
    echo "<script>
       window.location.href='../?page=about/index';
    </script>";
}
