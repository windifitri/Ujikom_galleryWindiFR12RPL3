<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
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
    <?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        ?>
        <div class="p-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">GALERImall</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav justify-content-center pe-3 flex-grow-1 ">

                            <li class="nav-item active">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Login.php">Login</a>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
        <?php
    } else {

        ?>

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
        <?php
    }
    ?>
    <br>
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -40px;
        background: hsla(0, 0%, 100%, 0.2);
        backdrop-filter: blur(10px);
        ">
        <div class="card-body py-5 px-md-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="row ">
                        <?php
                        include "koneksi.php";
                        $sql = mysqli_query($conn, "select * from foto,user where foto.userid=user.userid");
                        while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <div class="col-md-3">
                                <div class="card mb-3">
                                    <div class="card-body ">

                                        <p class="card-text">
                                            👤
                                            <?= $data['username'] ?>
                                        </p>
                                        <hr>

                                        <img class="card-img-top rounded" src="gambar/<?= $data['lokasifile'] ?>"
                                            alt="Card image cap">
                                        <a class="link-offset-2 link-underline link-underline-opacity-0 h4"
                                            href="like.php?fotoid=<?= $data['fotoid'] ?>">❤️</a>
                                        <b class="text-danger">
                                            <?php
                                            $fotoid = $data['fotoid'];
                                            $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                            echo mysqli_num_rows($sql2);
                                            ?>
                                        </b> likes
                                    </div>
                                    <div class="card-body ">

                                        <h5 class="card-title">
                                            <?= $data['judulfoto'] ?>
                                        </h5>
                                        <p class="card-text">
                                            <?= $data['deskripsifoto'] ?>
                                        </p>
                                        <p class="card-text">

                                        </p>
                                        <div class="text-end">
                                            <a class="btn btn-secondary opacity-75"
                                                href="komentar.php?fotoid=<?= $data['fotoid'] ?>">Komentar</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


</html>