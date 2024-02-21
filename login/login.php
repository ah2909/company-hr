<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Company-HR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/bd5d5fa01b.js" crossorigin="anonymous"></script>

  <title>Company-HR</title>
</head>

<body>
  <div class="bg-white mx-5">
    <div class="row">
      <div class="col-sm-5 px-auto mx-auto text-black">
        <div class="ps-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-0" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Web Dev</span>
        </div>
        <div class="d-flex align-items-center ps-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
          <form style="width: 23rem;" action="login_authentication.php" method="post">
            <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h1>
            <div class="form-outline mb-4">
              <label class="form-label fs-4" for="email">Email address:</label><br>
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email..." required />
            </div>
            <div class="form-group mb-4">
              <label class="form-label fs-4" for="password">Password:</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter your password..." required />
              <input type="checkbox" class="checkbox mt-2" onclick="togglePassword()" style="cursor: pointer; width: 20px; height: 20px;">
              <label class="form-label fs-6" for="password">Show password</label>
            </div>
            <div class="pt-1 mb-4">
              <button type="submit" class="btn btn-primary btn-lg btn-block" type="button" name="login">Login</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-sm-6 d-flex flex-wrap align-items-center">
        <img src="login-img.png" alt="Login image" class="img-fluid mx-auto d-block">
      </div>
    </div>
  </div>
</body>

</html>

<script>
  function togglePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>