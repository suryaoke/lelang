<?php

session_start();


if ($_SESSION == NULL) {
    echo "<script>
    alert('Anda Sudah Login')
    window.location.href='../admin/login/index.php'
    </script>";
}
include "koneksi.php";
include "layout/header.php";
include  "content.php";
include "layout/footer.php";
