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
    <title>Halaman edit album</title>
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">
    <style>
        body {
            background: rgb(157, 223, 221) !important;
            background: radial-gradient(circle,
                    rgba(157, 223, 221, 1) 0%,
                    rgba(151, 233, 148, 1) 100%) !important;
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
    <div class="p-3 mb-3">
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
    <div class="container text-white">
        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: 0px;
        background: hsla(0, 0%, 100%, 0.2);
        backdrop-filter: blur(10px);
        ">
            <div class="card-body py-5 px-md-5">
                <div class="row d-flex justify-content-center">

                    <p class="text-end">
                        Hi👋, <strong>
                            <?= $_SESSION['namalengkap'] ?>
                        </strong>
                    </p>
                    <h3 style="font-family:serif; border-bottom:solid 2px;">Edit Your Album Here!</h3>

                    <form action="update_album.php" method="post" class="pt-3">
                        <?php
                        include "koneksi.php";
                        $albumid = $_GET['albumid'];
                        $sql = mysqli_query($conn, "select * from album where albumid='$albumid'");
                        while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <input type="text" name="albumid" value="<?= $data['albumid'] ?>" hidden>
                            <table cellpadding="5">
                                <tr>
                                    <td>Nama Album</td>
                                    <td><input type="text" name="namaalbum" class="form-control"
                                            value="<?= $data['namaalbum'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><input type="text" name="deskripsi" class="form-control"
                                            value="<?= $data['deskripsi'] ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Ubah" class=" btn btn-light"></td>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>