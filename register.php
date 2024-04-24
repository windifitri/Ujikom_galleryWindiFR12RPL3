<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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
          <h2 class="fw-bold mb-5">Go Register!</h2>
          <form action="proses_register.php" method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label">Nama lengkap</label>
                  <input type="text" class="form-control border border-3" name="namalengkap">
                  
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label" >Email</label>  
                  <input type="text" class="form-control border border-3" name="email" placeholder="example@gmail.com" >
                  
                </div>
              </div>
            </div>

            <div class="form-outline mb-4">
              <label class="form-label">Alamat</label>  
              <input type="text" name="alamat" class="form-control border border-3">
              
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label">Username</label>  
              <input type="text" name="username" class="form-control border border-3">
              
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label">Password</label>  
              <input type="password" name="password" class="form-control border border-3">
              
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 ">
              Register
            </button>

            <!-- Register buttons -->

            <p>have an account? <a href="login.php">Login</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
</body>
</html>