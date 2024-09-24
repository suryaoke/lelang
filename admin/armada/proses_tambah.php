<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";

// Mengambil data dari form
$nama_armada = $_POST['nama_armada'];
$kapasitas = $_POST['kapasitas'];



$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


// Melakukan query update ke database
$tambah = mysqli_query($koneksi, "INSERT INTO armada ( nama_armada, kapasitas, foto) VALUES ( '$nama_armada', '$kapasitas', '$namafile')");

// Menampilkan pesan berdasarkan hasil query
if ($tambah) {
    echo "<script>
   
    window.location.href='../?page=armada/index';
    </script>";
} else {
    echo "<script>
   
    window.location.href='../?page=armada/index';
    </script>";
}
