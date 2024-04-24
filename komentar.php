<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman komentar</title>
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">
    <style>
        body {
            background: rgb(221, 98, 255);
        }

        .navbar-brand {
            margin-left: 10px;
            font-weight: bold;
            color: green;
        }

        .nav-link {
            color: #666777;
            font-weight: 900;
            position: relative;
        }

        .nav-link:hover,
        nav-link.active {
            color: #257b4a;
            border-bottom: solid;
        }
    </style>
</head>

<body>
    <div class="p-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">GALERImall</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav justify-content-center pe-3 flex-grow-1 ">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="album.php">Album</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="foto.php">Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="logout.php">Logout</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: 0px;
        background: hsla(0, 0%, 100%, 0.2);
        backdrop-filter: blur(10px);
        ">

        <div class="card-body py-5 px-md-5">
            <div class="row d-flex justify-content-center">
                <form action="tambah_komentar.php" method="post">
                    <?php
                    include "koneksi.php";
                    $fotoid = $_GET['fotoid'];
                    $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
                    while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
                        <table cellpadding="5"> 
                            <tr>
                                <td>judul</td>
                                <td><input type="text" name="judulfoto" value="<?= $data['judulfoto'] ?>" readonly class="form-control"></td>
                            </tr>
                            <tr>
                                <td>deskripsi</td>
                                <td><input type="text" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>foto</td>
                                <td><img src="gambar/<?= $data['lokasifile'] ?>" width="100px" alt=""></td>
                            </tr>
                            <tr>
                                <td>komentar</td>
                                <td><input type="text" name="isikomentar" class="form-control"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Tambah" class="btn btn-light"></td>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                </form>

                <table width="100%" border="1" cellpadding="5" cellspacing="0" class="mt-3">
                    <tr>
                        <th>ID</th>
                        <th>nama</th>
                        <th>komentar</th>
                        <th>tanggal</th>
                    </tr>
                    <?php
                    include "koneksi.php";
                    $userid = $_SESSION['userid'];
                    $sql = mysqli_query($conn, "select * from komentarfoto,user where komentarfoto.userid=user.userid and fotoid='$fotoid'");
                    while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td>
                                <?= $data['komentarid'] ?>
                            </td>
                            <td>
                                <?= $data['namalengkap'] ?>
                            </td>
                            <td>
                                <?= $data['isikomentar'] ?>
                            </td>
                            <td>
                                <?= $data['tanggalkomentar'] ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>