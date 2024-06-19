<?php
include('server/connect.php');

if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {

  $order_id = $_POST['order_id'];
  $order_status = $_POST['order_status'];
  $stmt = $connect->prepare("SELECT * FROM order_items where order_id = ?");
  $stmt->bind_param('i', $order_id);
  $stmt->execute();
  $order_details = $stmt->get_result();

  $order_total_price = calculateTOtalOrderPrice($order_details);
} else {
  header('location: account.php');
  exit;
}

function calculateTotalOrderPrice($order_details)
{

  $total = 0;

  foreach ($order_details as $row) {
    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];
    $total = $total + ($product_price * $product_quantity);
  }


  return $total;
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

          </form>
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



  <!--Details-->
  <section id="orders" class="orders container my-5 py-3">
    <div class="container mt-5">
      <h2 class="font-weight-bolde text-center">Order details</h2>
      <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5 mx-auto">
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>

      </tr>

      <?php foreach ($order_details as $row) { ?>

        <tr>
          <td>
            <div class="product-info"><img src="assets/images/<?php echo $row['product_image']; ?>" />
              <div>
                <p class="mt-3"><?php echo $row['product_name']; ?></p>
              </div>
            </div>

          </td>

          <td>
            <span>$<?php echo $row['product_price']; ?></span>
          </td>
          <td>
            <span><?php echo $row['product_quantity']; ?></span>
          </td>


        </tr>
      <?php } ?>
    </table>

    <?php if ($order_status == "not paid") { ?>
      <form style="float: right;" method="POST" action="payment.php">
        <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>" />
        <input type="hidden" name="order_status" value="<?php echo $order_status; ?>" />
        <input type="submit" name="order_pay_btn" class="btn btn-success" value="Pay Now" />
      </form>

    <?php } ?>


  </section>
















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>