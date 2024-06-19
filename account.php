<?php

session_start();
include('server/connect.php');

if (!isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
}

if (isset($_GET['logout'])) {
  if (isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
    unset($_session['user_email']);
    unset($_session['user_name']);
    header('location: login.php');
    exit;
  }
}


// get order
if (isset($_SESSION['logged_in'])) {
  $user_id = $_SESSION['user_id'];

  $stmt = $connect->prepare("SELECT * FROM orders Where user_id =?");

  $stmt->bind_param('i', $user_id);

  $stmt->execute();

  $orders = $stmt->get_result();
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
            <a href="#" class="fas profile-2">
              <img src="assets/images/Profile.png" alt="Circle User" style="width: 34px; height: 34px;">
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <section class="my-5 py-5">
    <div class="row container mx-auto">
      <div class="text-center mt-3 pt-5 col-lg col-md-12 col-sm-12">
        <h3 class="font-weight-bold">Account Info</h3>
        <hr class="mx-auto">
        <div class="account-info">
          <p>Name: <span><?php if (isset($_SESSION['user_name'])) {
                            echo $_SESSION['user_name'];
                          } ?></span></p>
          <p>Email: <span><?php if (isset($_SESSION['user_email'])) {
                            echo $_SESSION['user_email'];
                          } ?></span></p>
          <p><a href="#orders" id="orders-btn">Your Orders</a></p>
          <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
        </div>
      </div>
    </div>
  </section>


  <!--Orders-->
  <section id="orders" class="orders container my-5 py-3">
    <div class="container mt-2">
      <h2 class="font-weight-bolde text-center">Your Orders</h2>
      <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5">
      <tr>
        <th>Order cost</th>
        <th>Order status</th>
        <th>Order Date</th>
        <th>Order Details</th>
      </tr>
      <?php while ($row = $orders->fetch_assoc()) { ?>
        <tr>
          <td>
            <span><?php echo $row['order_cost']; ?></span>
          </td>
          <td>
            <span><?php echo $row['order_status']; ?></span>
          </td>
          <td>
            <span><?php echo $row['order_date']; ?></span>
          </td>
          <td>
            <form method="POST" action="details.php">
              <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status" />
              <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id" />
              <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details" />
            </form>
          </td>
        </tr>
      <?php } ?>
    </table>
  </section>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>