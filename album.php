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
    <title>Halaman album</title>
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">
    <style>
        body {
            background: rgb(221, 98, 255);
        }
        .navbar-brand{
            margin-left: 10px;
            font-weight:  bold;
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
        background: hsla(0, 0%, 100%, 0.3);
        backdrop-filter: blur(10px);
        ">


        <div class="container">
            <p class="text-end mt-3 ">
                Hi👋, <strong>
                    <?= $_SESSION['namalengkap'] ?>
                </strong>
            </p>
            <h3 style="font-family:serif; border-bottom:solid 2px;">Welcome To Album Page!</h3>



            <form action="tambah_album.php" method="post" class="pt-3">
                <table cellpadding="5">
                    <tr>
                        <td>Nama Album</td>
                        <td><input type="text" name="namaalbum" class="form-control"></td>
                        <td>Deskripsi</td>
                        <td><input type="text" name="deskripsi" class="form-control"></td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tambah" class="btn btn-light"></td>
                    </tr>
                </table>
            </form>
            <table border="1" cellpadding="5" cellspacing="0" class="table table-light table-striped table-hover mt-5"
                width="100%">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>deskripsi</th>
                    <th>tanggal dibuat</th>
                    <th class="text-center">aksi</th>
                </tr>
                <?php
                include "koneksi.php";
                $userid = $_SESSION['userid'];
                $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td>
                            <?= $data['albumid'] ?>
                        </td>
                        <td>
                            <?= $data['namaalbum'] ?>
                        </td>
                        <td>
                            <?= $data['deskripsi'] ?>
                        </td>
                        <td>
                            <?= $data['tanggaldibuat'] ?>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="hapus_album.php?albumid=<?= $data['albumid'] ?>">🗑️</a>
                            <a class="btn btn-warning" href="edit_album.php?albumid=<?= $data['albumid'] ?>">✏️</a>
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </table>

        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>