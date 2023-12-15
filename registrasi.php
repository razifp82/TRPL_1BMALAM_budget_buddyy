<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Budget Buddy | Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Budget_Buddy/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="Budget_Buddy/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Budget_Buddy/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="Budget_Buddy/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page" style="background-color: #1abc9c";>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="Budget_Buddy/index.php?page=beranda" class="h1"><b>Budget Buddy</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register to start your session</p>

      <form action="conf/autentikasi_rg.php" method="post">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Konfirmasi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Agree <a href="#"></a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a ></a>
      </p>
      <p class="mb-0">
        <a href="index.php" class="text-center">I have an account</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="Budget_Buddy/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Budget_Buddy/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Budget_Buddy/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="Budget_Buddy/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
<?php
if (isset ($_GET['error'])) {
$x = ($_GET['error']);
if($x==1){
  echo "
  <script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'error',
    title: 'Register Gagal'
  })
  </script>";
}
if($x==2){
  echo "
  <script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'warning',
    title: 'Silahkan Inputkan Email, Username & Password'
  })
  </script>";
}
else{
  echo '';
}
}
?>
</html>
