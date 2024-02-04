<!doctype html>

<?php

session_start();

if (isset($_POST['btnSearch'])) {
    $cari = $_POST['cari'];
} else {
    $cari = '';
}

include 'koneksi.php';

$jumlahDataPerhalaman = 3;
$query = mysqli_query($konek, "SELECT * FROM tb_buku WHERE judul LIKE '%$cari%' 
        OR penerbit LIKE '%$cari%' 
        OR pengarang LIKE '%$cari%' 
        OR kategori LIKE '%$cari%' ");
$jumlahData = mysqli_num_rows($query);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

if (isset($_GET['halaman'])) {
    $halamanAktif = $_GET['halaman'];
} else {
    $halamanAktif = 1;
}

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stile.css">
    <link rel="icon" href="gambar/icon.png">
    <title>Data Buku</title>
</head>

<body>
    <!-- Navbar -->
    <div class="container-md mt-3">
        <nav class="navbar navbar-light bg-transparent">
            <div class="container-fluid">
                <?php
                if (!isset($_SESSION['username'])) {
                    ?>
                    <div class="textlogo text-info"><img src="gambar/icon.png" alt="icon">Data Buku
                    </div>
                <?php } else { ?>
                    <div class="textlogo text-info ml-2"><img src="gambar/admin.png" alt="icon"> Admin
                    </div>
                <?php } ?>
                <form class="d-flex ms-auto" method="post">
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search"
                        name="cari">
                    <button class="btn btn-outline-success rounded-pill" type="submit" name="btnSearch">Search</button>
                </form>
                <?php
                if (!isset($_SESSION['username'])) {
                    ?>
                    <ul class="navbar-nav ms-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php" aria-current="page"><button
                                    class="btn btn-primary rounded-pill"><img src="gambar/admin.png" alt="admin"
                                        style="width:20px;height:20px;"> Login
                                    Admin</button></a>
                        </li>
                    </ul>
                <?php } else {
                    ?>
                    <ul class="navbar-nav ms-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php"><button
                                    class="btn btn-primary rounded-pill"><img src="gambar/exit.png" alt="admin"
                                        style="width:20px;height:20px;"> Logout</button></a>
                        </li>
                    </ul>
                <?php }
                ?>
            </div>
        </nav>
        <figure class="text-center mt-5 text-white">
            <blockquote class="blockquote">
                <p>Data Buku yang Tersedia</p>
            </blockquote>
            <figcaption class="blockquote-footer text-white">
                <cite title="Source Title">CRUD : Create, Read, Update , dan Delete</cite>
            </figcaption>
        </figure>
        <?php
        if (!isset($_SESSION['username'])) {

        } else {
            ?>
            <a href="olah.php" type="button" class="btn btn-primary mb-3 rounded-pill">
                <svg xmlns="http://www.w3.org/2000/svg" wid th="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                </svg> Tambah
            </a>
        <?php }
        ?>
        <table class="table table-bordered align-middle text-white ">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Gambar</th>
                    <?php
                    if (!isset($_SESSION['username'])) {

                    } else {
                        ?>
                        <th scope="col">Aksi</th>
                    <?php }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tb_buku WHERE judul LIKE '%$cari%' 
        OR penerbit LIKE '%$cari%' 
        OR pengarang LIKE '%$cari%' 
        OR kategori LIKE '%$cari%' LIMIT $awalData,$jumlahDataPerhalaman";
                $sql = mysqli_query($konek, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr class="text-center">
                        <th scope="row">
                            <?php echo $no; ?>
                        </th>
                        <td>
                            <?php echo $data['judul']; ?>
                        </td>
                        <td>
                            <?php echo $data['pengarang']; ?>
                        </td>
                        <td>
                            <?php echo $data['penerbit']; ?>
                        </td>
                        <td>
                            <?php echo $data['kategori']; ?>
                        </td>
                        <td><img src="gambar/<?php echo $data['gambar']; ?> " alt="gambar" style="width: 100px;"></td>

                        <?php
                        if (!isset($_SESSION['username'])) {

                        } else {
                            ?>
                            <td><a href="olah.php?edit=<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-pencil-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg></a>
                                <a href="proses.php?hapus=<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                    </svg> </a>
                            </td>
                        <?php }
                        ?>
                    </tr>
                    <?php
                    $no++;
                } ?>
            </tbody>
        </table>


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php

                if ($halamanAktif == 1) {

                } else {
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" tabindex="-1"
                            aria-disabled="true">Sebelumnya</a>
                    </li>
                <?php }
                ?>
                <?php
                for ($i = 1; $i <= $jumlahHalaman; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?> ">
                            <?php echo $i; ?>
                        </a></li>
                <?php } ?>
                <?php
                if ($halamanAktif == $jumlahHalaman) {

                } else {

                    ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Selanjutnya</a>
                    </li>
                <?php }
                ?>
            </ul>
        </nav>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="script.js"></script>

</body>

</html>