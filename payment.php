<?php

session_start();

/* if(isset($_POST['order_pay_btn'])){
  $order_status = $_POST['order_status'];
  $order_total_price = $_POST['order_total_price'];
} */


// Check if the form is submitted
if (isset($_POST['order_pay_btn'])) {
  // Assuming payment is successful, you can send an email here
  // and set the payment status accordingly
  $payment_status = "paid";
  // You can include code here to send an email


  // Clear the cart
  unset($_SESSION['cart']);
  // You can also redirect the user to a success page if needed
  // header("Location: payment_success.php");

  // Optionally, you can unset session variables or perform any other necessary actions
  // unset($_SESSION['total']);

  // Display success message
  echo '<script>alert("Email sent and amount is paid");</script>';

  echo '<script>setTimeout(function() { window.location.href = "account.php"; }, 300);</script>';
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
            <a href="account.php" class="fas profile-2">
              <img src="assets/images/Profile.png" alt="Circle User" style="width: 34px; height: 34px;">
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>


  <!--Payment-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Payment</h2>
      <hr class="max-auto">
    </div>
    <div class="mx-auto container text-center">
      <?php if (isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
        <p>Total payment: $<?php echo $_SESSION['total']; ?> </p>
        <form method="post">
          <input type="submit" name="order_pay_btn" class="btn btn-success" value="Pay Now" />
        </form>

      <?php } else if (isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
        <p>Total payment: $<?php echo $_POST['order_total_price']; ?></p>
        <form method="post">
          <input type="submit" name="order_pay_btn" class="btn btn-success" value="Pay Now" />
        </form>

      <?php } else { ?>
        <p>You don't have an order</p>
      <?php } ?>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>