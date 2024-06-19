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

          <form class="d-flex" role="search" action="search.php" method="GET" style="padding-right: 10px;">
            <input class="form-control me-2" type="search" name="query" placeholder="Search Items" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
          <li class="nav-item">
            <a href="cart.php" class="cart-1">
              <img src="assets/images/Cart.png" alt="Cart Shopping" style="width: 34px; height: 34px;">
            </a>
          </li>
          <li class="nav-item">
            <a href="account.php" class="profile-1">
              <img src="assets/images/Profile.png" alt="Circle User" style="width: 34px; height: 34px;">
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <!-- Grid Section -->
  <div class="container mt-5 product-container">
    <div class="row">
      <?php
      include('server/connect.php');

      $store = $connect->prepare("SELECT * FROM products WHERE product_category = 'Household Goods' AND product_sub_category = 'Cooking Tools' ");
      $store->execute();
      $cooking = $store->get_result();

      while ($row = $cooking->fetch_assoc()) {
        $button_class = $row['in_stock'] ? 'btn-outline-success' : 'btn-outline-secondary disabled';
        $button_text = $row['in_stock'] ? 'Add to Cart' : 'Out of Stock';
        $quantity_disabled = $row['in_stock'] ? '' : 'disabled';
      ?>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="assets/images/<?php echo $row['product_image']; ?>" class="card-img-top" alt="bowls">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
              <p>Unit: <?php echo $row['product_unit']; ?></p>
              <p>Price: $<?php echo $row['product_price']; ?></p>
              <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />
                <input type="number" name="product_quantity" value="1" aria-label="quantitycart" <?php echo $quantity_disabled; ?> />

                <button class="btn <?php echo $button_class; ?>" type="submit" name="add_to_cart" <?php if (!$row['in_stock']) echo 'disabled'; ?>>
                  <?php echo $button_text; ?>
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>