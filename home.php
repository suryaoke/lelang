<?php

$about = mysqli_query($koneksi, "SELECT * FROM about");
$a = mysqli_fetch_array($about);

$kontak = mysqli_query($koneksi, "SELECT * FROM kontak");
$k = mysqli_fetch_array($kontak);

?>
<style>
    .team-item img,
    .package-item img,
    .popular-item1 img,
    .popular-item2 img,
    .popular-item3 img {
        width: 100%;
        /* Membuat lebar gambar selalu mengikuti lebar kontainer */
        height: 250px;
        /* Menentukan tinggi tetap untuk semua gambar */
        object-fit: cover;
        /* Memotong gambar agar sesuai dengan ukuran kontainer tanpa mengubah proporsi */
    }
</style>
<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        <?php

        $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
        while ($data =  mysqli_fetch_array($query)) {
        ?>
            <!-- Single Catagory -->
            <div class="single-products-catagory clearfix">
                <a href="shop.html">
                    <img src="../admin/uploads/<?php echo $data['foto'] ?>" alt="">
                    <!-- Hover Content -->
                    <div class="hover-content">
                        <div class="line"></div>
                        <p>Kategori</p>
                        <h4> <?= $data['nama_kategori'] ?> </h4>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Product Catagories Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Newsletter Area Start ##### -->
<section class="newsletter-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center">
            <!-- Newsletter Text -->
            <div class="col-12 col-lg-6 col-xl-7 mt-4">
                <div class="newsletter-text mb-100 mt-4">
                    <h2> <?= $a['visi'] ?> </h2>
                    <p><?= $a['misi'] ?> </p>
                    <p><?= $k['alamat'] ?> </p>
                    <p><?= $k['no_telp'] ?> </p>
                </div>
            </div>
            <!-- Newsletter Form -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="newsletter-form mb-100">
                    <form action="#" method="post">
                        <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Newsletter Area End ##### -->