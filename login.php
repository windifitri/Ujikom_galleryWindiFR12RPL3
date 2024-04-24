<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('assets/ig/ijo.jpg');
        height: 200px;
        background-size:100%;
        background-repeat: no-repeat;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -150px;
        background: hsla(0, 0%, 100%, 0.5);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Login Here!</h2>
          <form action="proses_login.php" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label">Username</label>  
              <input type="text" name="username" class="form-control border border-4">
              
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label">Password</label>  
              <input type="password" name="password" class="form-control border border-4">
              
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Login
            </button>

            <!-- Register buttons -->

            <p>Don't have any account? <a href="register.php">Register</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>hal login</h1>
    <form action="proses_login.php" method="post">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text"  name="username"></td>
            </tr>
            <tr>
                <td>pass</td>
                <td><input type="password"  name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit"  value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html> -->