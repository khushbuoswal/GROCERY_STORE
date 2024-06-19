<?php

session_start();
include('connect.php');

if (!isset($_SESSION['logged_in'])) {
  header('location: ../checkout.php?message=Please login/register to place an order');
  exit;
} else {

  if (isset($_POST['order'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "paid";
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y-m-d H:i:s');


    foreach ($_SESSION['cart'] as $key => $value) {
      $product = $_SESSION['cart'][$key];
      $product_id = $product['product_id'];
      $product_name = $product['product_name'];
      $product_image = $product['product_image'];
      $product_price = $product['product_price'];
      $product_quantity = $product['product_quantity'];


      $stmt_check_stock = $connect->prepare("SELECT in_stock FROM products WHERE product_id = ?");
      $stmt_check_stock->bind_param('i', $product_id);
      $stmt_check_stock->execute();
      $stmt_check_stock->bind_result($in_stock);
      $stmt_check_stock->fetch();
      $stmt_check_stock->close();

      if ($in_stock < $product_quantity) {

        echo '<script>document.getElementById("checkout-btn").style.backgroundColor = "gray";</script>';
        echo '<script>alert("Insufficient stock for ' . $product_name . '");</script>';
        echo '<script>setTimeout(function() { window.location.href = "../cart.php"; }, 300);</script>';
        exit;
      }
      $stmt = $connect->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
      VALUES (?,?,?,?,?,?,?); ");

      $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

      $stmt_status = $stmt->execute();
      if (!$stmt_status) {
        header('location: index.php');
        exit;
      }



    $order_id = $stmt->insert_id;


      $stmt1 = $connect->prepare("INSERT INTO order_items(order_id,product_id,product_name,product_image,product_price, product_quantity,user_id,order_date)
        
                           VALUES (?,?,?,?,?,?,?,?)");
      $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);

      $stmt1->execute();

      $new_stock = $in_stock - $product_quantity;
      $stmt_update_stock = $connect->prepare("UPDATE products SET in_stock = ? WHERE product_id = ?");
      $stmt_update_stock->bind_param('ii', $new_stock, $product_id);
      $stmt_update_stock->execute();
      $stmt_update_stock->close();
    }



    header('location: ../payment.php?order_status=order placed successfully');
  }
}
