<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ BASE_URL }}app/css/font-awesome.css">
  <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="app/img/FPT_Polytechnic_Hanoi.png" class="img-fluid" alt="">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="{{ BASE_URL . 'login/check-login' }}" method="post">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3">Đăng nhập với</p>
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <!-- <i class="fab fa-google"></i> -->
                Google
              </button>
            </div>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Hoặc</p>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Email</label>
              <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Xin mời nhập email" name="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Xin mời nhập password" name="password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Quên mật khẩu?</a>
            </div>


            <div class="text-center text-lg-start mt-4 pt-2">
            <?php
              if (isset($_SESSION['mess'])) {
                echo "<h4 style='color:red'>" . $_SESSION['mess'] . "</h4>";
                unset($_SESSION['mess']);
              }
              ?>
              <br>
              <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>


            </div>

          </form>
        </div>
      </div>
    </div>

  </section>

</body>

</html>