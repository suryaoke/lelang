<?php


session_start();
$_SESSION['update_success'] = '  Data Berhasil Diubah';
include "../koneksi.php";

// Mengambil data dari form
$id_tim = $_POST['id_tim']; // ID tim yang akan diupdate
$nama_tim = $_POST['nama_tim'];
$jabatan = $_POST['jabatan'];

// Menangani upload file foto
if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['foto']['name'];
    $namaSementara = $_FILES['foto']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Melakukan query update ke database
$update = mysqli_query($koneksi, "UPDATE tim SET nama_tim='$nama_tim', jabatan='$jabatan',  foto='$namafile' WHERE id_tim='$id_tim'");


// Menampilkan pesan berdasarkan hasil query
if ($update) {
    echo "<script>
   
    window.location.href='../?page=tim/index';
    </script>";
} else {
    echo "<script>
       window.location.href='../?page=tim/index';
    </script>";
}
