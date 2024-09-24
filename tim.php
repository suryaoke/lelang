<!-- Team Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Tim</h6>
            <h1 class="mb-5">Tim</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <?php
            $no = 1;
            $querytim = mysqli_query($koneksi, "SELECT * FROM tim ORDER BY id_tim ASC");
            while ($tim =  mysqli_fetch_array($querytim)) {

            ?>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="admin/uploads/<?php echo $tim['foto']; ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0"><?php echo $tim['nama_tim'] ?></h5>
                    <p><?php echo $tim['jabatan'] ?></p>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, soluta?</p>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- Team End -->