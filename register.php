<?php
session_start();
include('server/connect.php');

if (isset($_SESSION['logged_in'])) {
  header('location: account.php');
  exit;
}



if (isset($_POST['register'])) {
  $reg_name = $_POST['name'];
  $reg_email = $_POST['email'];
  $reg_password = $_POST['password'];
  $reg_confirmPassword = $_POST['confirmPassword'];

  if ($reg_password !== $reg_confirmPassword) {
    header('location: register.php?error =The passwords you entered do not match. Please try again.');
  } else if (strlen($reg_password) < 3) {
    header('location: register.php?error=Password should contain a minimum of 3 characters');
  } else {
    $stmt1 = $connect->prepare("SELECT count(*) FROM users where user_email= ?");
    $stmt1->bind_param('s', $reg_email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();
    if ($num_rows != 0) {
      header('location: register.php?error=Registration failed. Please try again. Email already exists');
    } else {
      $stmt = $connect->prepare("INSERT INTO users(user_name, user_email, user_password)
                    VALUES(?,?,?)");
      $stmt->bind_param('sss', $reg_name, $reg_email, md5($reg_password));




      if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $reg_email;
        $_SESSION['user_name'] = $reg_name;
        $_SESSION['logged_in'] = true;
        header('location: account.php?register=Registration successful');
      } else {
        header('location: register.php?error=Registration failed. Please try again later.');
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3ef8ae306d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body style="background-color: rgb(243, 243, 228);">

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
    <div class="container-fluid">
      <i class="fa-solid fa-basket-shopping" style="color: rgb(3, 87, 3); font-size: 34px;"></i>
      <a class="nav-bar" href="#" style="color: rgb(3, 87, 3); font-size: 34px; font-weight: bold;">Market</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-twenty" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Shop
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="all.php">All</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="household.php">Household Goods</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="cleaning.php">Cleaning</a></li>
                  <li><a class="dropdown-item" href="plants.php">Plants</a></li>
                  <li><a class="dropdown-item" href="cooking.php">Cooking Tools</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="pet.php">Pet Food</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="canned.php">Canned</a></li>
                  <li><a class="dropdown-item" href="dry.php">Dry</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="fresh.php">Fresh</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="fruitsveg.php">Fruits and Vegetables</a></li>
                  <li><a class="dropdown-item" href="dairy.php">Dairy Products</a></li>
                  <li><a class="dropdown-item" href="protein.php">Protein</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="frozen.php">Frozen</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="plantable.php">Frozen Plantable</a></li>
                  <li><a class="dropdown-item" href="frozenseafood.php">Frozen Non-Plantable</a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="beverages.php">Beverages</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="contact.php">Help</a>
          </li>

          <li class="nav-item" id="image-mine">
            <a href="cart.php" class="fas cart-2">
              <img src="assets/images/Cart.png" alt="Cart Shopping" style="width: 34px; height: 34px;">
            </a>
          </li>
          <li class="nav-item">
            <a href="account.php" class="fas profile-2">
              <img src="assets/images/Profile.png" alt="Circle User" style="width: 34px; height: 34px;">
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Register</h2>
      <hr class="mx-auto">
    </div>
    <div class="mx-auto container">

      <form id="register-form" method="POST" action="register.php">
        <p style="color: red;"><?php if (isset($_GET['error'])) {
                                  echo $_GET['error'];
                                } ?></p>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required />
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required />
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required />
        </div>
        <div class="form-group">
          <input type="submit" class="btn" id="register-btn" name="register" value="Register" />
        </div>
        <div class="form-group">
          <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
        </div>
      </form>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>