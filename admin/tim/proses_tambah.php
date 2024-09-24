<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";

// Mengambil data dari form
$nama_tim = $_POST['nama_tim'];
$jabatan = $_POST['jabatan'];



$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


// Melakukan query update ke database
$tambah = mysqli_query($koneksi, "INSERT INTO tim ( nama_tim, jabatan, foto) VALUES ( '$nama_tim', '$jabatan', '$namafile')");

// Menampilkan pesan berdasarkan hasil query
if ($tambah) {
    echo "<script>
       window.location.href='../?page=tim/index';
    </script>";
} else {
    echo "<script>
     window.location.href='../?page=tim/index';
    </script>";
}
