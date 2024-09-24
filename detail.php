<?php

// Mendapatkan id_kategori dari parameter URL
$slug = $_GET['slug'];

// Mengambil data kategori berdasarkan id_kategori
$wisata = mysqli_query($koneksi, "SELECT * FROM wisata WHERE slug = '$slug'");
$k = mysqli_fetch_array($wisata);
?>

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="admin/uploads/<?= $k['gambar_wisata'] ?>" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4">Welcome to <span class="text-primary">Wisata</span></h1>
                <p class="mb-4"><?= $k['judul_wisata'] ?> </p>
                <p class="mb-4"><?= $k['isi_wisata'] ?> </p>

                <a class="btn btn-primary py-3 px-5 mt-2" href="/">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->