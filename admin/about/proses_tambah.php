<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mengambil data dari form
$visi = $_POST['visi'];
$misi = $_POST['misi'];



$namafile = $_FILES['gambar_about']['name'];
$namaSementara = $_FILES['gambar_about']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


// Melakukan query update ke database
$tambah = mysqli_query($koneksi, "INSERT INTO about ( visi, misi, gambar_about) VALUES ( '$visi', '$misi', '$namafile')");

// Menampilkan pesan berdasarkan hasil query
if ($tambah) {
    echo "<script>
      window.location.href='../?page=about/index';
    </script>";
} else {
    echo "<script>
    
    window.location.href='../?page=about/index';
    </script>";
}
