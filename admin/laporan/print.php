<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Wisata</title>
    <!-- Google Web Fonts -->
</head>

<body>
    <center style="margin-bottom: 30px;">
        <h2>Laporan Wisata</h2>
        <?php echo date('D, d M Y', strtotime($_POST['tgl_mulai']))  ?>
        s/d
        <?php echo date('D, d M Y', strtotime($_POST['tgl_mulai'])) ?>

    </center>

    <table border="1" style="border-collapse: collapse; width: 85%;text-align:center;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Judul Wisata</th>
                <th>Tanggal Wisata</th>
                <th>Isi Wisata</th>
                <th>Gambar Wisata</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../koneksi.php";
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM wisata 
                                 JOIN kategori ON wisata.id_kategori=kategori.id_kategori
                                WHERE tgl_wisata BETWEEN '$_POST[tgl_mulai]' AND '$_POST[tgl_sampai]'
                                
                                 ORDER BY id_wisata DESC");


            while ($data =  mysqli_fetch_array($query)) {
            ?>
                <tr>

                    <td><?php echo $no++ ?></td>
                    <td> <?php echo $data['nama_kategori'] ?></td>
                    <td> <?php echo $data['judul_wisata'] ?></td>
                    <td> <?php echo date('d-m-Y', strtotime($data['tgl_wisata'])) ?></td>
                    <td> <?php echo substr($data['isi_wisata'], 0, 50)  ?></td>
                    <td> <img width="100" src="../../admin/uploads/<?php echo $data['gambar_wisata'] ?>" alt=""></td>
                <?php } ?>

        </tbody>

    </table>
    <br><br><br>
    <div style="position:absolute; right: 70px;">

        Padang, <?= date('d M Y') ?>
        <br><br><br>
        Pimpinan
    </div>

    <script>
        window.print()
    </script>
</body>

</html>