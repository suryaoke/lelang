<?php
include "../koneksi.php";
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
// $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$password = $_POST['password'];
$role = $_POST['role'];


$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


// Memperbaiki query dengan menambahkan kurung tutup yang hilang
$tambah = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, username, password, foto, role) VALUES ('$nama_lengkap', '$username', '$password', '$namafile', '$role' )");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Ditambahkan');
    window.location.href='../?page=login/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
    alert('Data Gagal Ditambahkan ');
    window.location.href='../?page=login/index';
    </script>";
}
