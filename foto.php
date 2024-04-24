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
    <title>Halaman foto</title>
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
                    <p class="text-end">
                        Hi👋, <strong>
                            <?= $_SESSION['namalengkap'] ?>
                        </strong>
                    </p>
                    <h3 style="font-family:serif; border-bottom:solid 2px;">Welcome To Photo Page!</h3>
                    
                    <form action="tambah_foto.php" method="post" enctype="multipart/form-data" class="pt-3">
                        <table cellpadding="5">
                            <tr>
                                <td>Judul</td>
                                <td><input type="text" name="judulfoto" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><input type="text" name="deskripsifoto" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Lokasi File</td>
                                <td><input type="file" name="lokasifile" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Album</td>
                                <td>
                                    <select name="albumid" class="form-select">
                                        <?php
                                        include "koneksi.php";
                                        $userid = $_SESSION['userid'];
                                        $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                                        while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?= $data['albumid'] ?>">
                                                <?= $data['namaalbum'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Tambah" class="btn btn-light"></td>
                            </tr>
                        </table>
                    </form>
                    <table border="1" cellpadding="5" cellspacing="0"
                        class="table table-light table-striped table-hover mt-3">
                        <tr>
                            <th>ID</th>
                            <th>judul</th>
                            <th>deskripsi</th>
                            <th>tanggal unggah</th>
                            <th>lokasi file</th>
                            <th>album</th>
                            <th>disukai</th>
                            <th>aksi</th>
                        </tr>
                        <?php
                        include "koneksi.php";
                        $userid = $_SESSION['userid'];
                        $sql = mysqli_query($conn, "select * from foto, album where foto.userid = '$userid' and foto.albumid=album.albumid");
                        while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td>
                                    <?= $data['fotoid'] ?>
                                </td>
                                <td>
                                    <?= $data['judulfoto'] ?>
                                </td>
                                <td>
                                    <?= $data['deskripsifoto'] ?>
                                </td>
                                <td>
                                    <?= $data['tanggalunggah'] ?>
                                </td>
                                <td>
                                    <img src="gambar/<?= $data['lokasifile'] ?>" alt="" width="100px">
                                </td>
                                <td>
                                    <?= $data['namaalbum'] ?>
                                </td>
                                <td>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                    echo mysqli_num_rows($sql2);
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="hapus_foto.php?fotoid=<?= $data['fotoid'] ?>" onclick="return confirm('Yakin ingin hapus foto?')">🗑️</a>
                                    <a class="btn btn-warning" href="edit_foto.php?fotoid=<?= $data['fotoid'] ?>">✏️</a>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>