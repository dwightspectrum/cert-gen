<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hotware Certificate Generator</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/settings/hwi-logo-r.png" rel="icon">
  <link href="assets/img/settings/hwi-logo-r.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Scripts here -->
  <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/settings/hwi-logo-r.png" alt="">
                  <span class="d-none d-lg-block">Hotware</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3" id="sign-up-form" method="POST">
                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group">
                        <input type="text" name="username" class="form-control" id="username" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="user_first_name" class="form-label">Firstname</label>
                      <div class="input-group">
                        <input type="text" name="user_firstname" class="form-control" id="user_firstname" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="user_last_name" class="form-label">Lastname</label>
                      <div class="input-group">
                        <input type="text" name="user_lastname" class="form-control" id="user_lastname" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit" id="sign-up-btn">Sign Up</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>


  <script type="module" src="assets/js/credential/register.js?v=1.0"></script>

</body>

</html>