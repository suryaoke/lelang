<?php

session_start();
$_SESSION['update_success'] = '  Data Berhasil Diubah';
include "../koneksi.php";

// Mengambil data dari form
$id_armada = $_POST['id_armada']; // ID armada yang akan diupdate
$nama_armada = $_POST['nama_armada'];
$kapasitas = $_POST['kapasitas'];

// Menangani upload file foto
if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['foto']['name'];
    $namaSementara = $_FILES['foto']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Melakukan query update ke database
$update = mysqli_query($koneksi, "UPDATE armada SET nama_armada='$nama_armada', kapasitas='$kapasitas',  foto='$namafile' WHERE id_armada='$id_armada'");


// Menampilkan pesan berdasarkan hasil query
if ($update) {
    echo "<script>
    window.location.href='../?page=armada/index';
    </script>";
} else {
    echo "<script>
       window.location.href='../?page=armada/index';
    </script>";
}
