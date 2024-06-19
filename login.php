<?php

session_start();
include('server/connect.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if(isset($_POST['login_btn'])){
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 $stmt = $connect->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email =? AND user_password = ? LIMIT 1");
 $stmt->bind_param('ss',$email,$password);
 if($stmt->execute()){
  $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
  $stmt->store_result();
  if($stmt->num_rows() == 1){
    $stmt->fetch();

    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['logged_in'] = true;

    header('location: account.php?message=logged in successfully');
  }else{
    header('location: login.php?error=could not verify your account');
  }
 }else{
  header('location: login.php?error=something went wrong');
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
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body style="background-color: rgb(243, 243, 228);">

<!--Navbar-->
<nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
    <div class="container-fluid">
        <i class="fa-solid fa-basket-shopping" style="color: rgb(3, 87, 3); font-size: 34px;"></i>
      <a class="nav-bar"  href="#" style="color: rgb(3, 87, 3); font-size: 34px; font-weight: bold;">Market</a>
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
                <li><hr class="dropdown-divider"></li>
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
        <h2 class = "form-weight-bold">Login</h2>
        <hr class = "mx-auto">
    </div>
    <div class = "mx-auto container">
      
        <form id = "login-form" method = "POST" action = "login.php">
        <p style = "color:red" class="text-center"><?php if (isset($_GET['error'])){echo $_GET['error'];}?></p>
            <div class="form-group" >
              
                <label>Email</label>
                <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name = "login_btn" value="Login"/>
            </div>
            <div class="form-group">
                <a id="register-url" href ="register.php" class="btn">Don't have account? Register</a>

            </div>
  

        </form>
    </div>
  </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>