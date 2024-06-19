<?php

session_start();


function isCartEmpty()
{
    return empty($_SESSION['cart']);
}

if (isset($_POST['add_to_cart'])) {

    // if user has already added a product to cart
    if (isset($_SESSION['cart'])) {


        $products_array_ids = array_column($_SESSION['cart'], 'product_id');
        // if product has already been added to the cart or not
        if (in_array($_POST['product_id'], $products_array_ids)) {
            // Increment quantity by one
            $_SESSION['cart'][$_POST['product_id']]['product_quantity']++;
            echo '<script>alert("Quantity updated in cart");</script>';
        } else {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity
            );

            $_SESSION['cart'][$product_id] = $product_array;
        }
    }
    // if this is the first product
    else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(

            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );
        $_SESSION['cart'][$product_id] = $product_array;
    }
    storeCartInCookie($_SESSION['cart']);
    calculateTotalCart();

    // remove product from cart 
} else if (isset($_POST['remove_product'])) {

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    storeCartInCookie($_SESSION['cart']);
    calculateTotalCart();
} else if (isset($_POST['edit_quantity'])) {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    $product_array  = $_SESSION['cart'][$product_id];
    $product_array['product_quantity'] = $product_quantity;
    $_SESSION['cart'][$product_id] = $product_array;
    storeCartInCookie($_SESSION['cart']);
    calculateTotalCart();
} else if (isset($_POST['action']) && $_POST['action'] === 'clear_cart') {
    unset($_SESSION['cart']);
    storeCartInCookie(array());
    $_SESSION['$total'] = 0;
} else {
    // header('location: index.php');
}

function calculateTotalCart()
{

    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $price = floatval($product['product_price']);
        $quantity = intval($product['product_quantity']);
        $total = $total + ($price * $quantity);
    }
    $_SESSION['total'] = $total;
}
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : getCartFromCookie();
?>


<?php
// Function to encode cart data as JSON and store it in a cookie
function storeCartInCookie($cartData)
{
    $cartJson = json_encode($cartData);
    setcookie('cart', $cartJson, time() + (86400 * 30), "/"); // Cookie expires in 30 days
}

// Function to retrieve cart data from the cookie
function getCartFromCookie()
{
    if (isset($_COOKIE['cart'])) {
        return json_decode($_COOKIE['cart'], true);
    } else {
        return array(); // Return an empty array if cart cookie doesn't exist
    }
}

// Check if the user has a cart stored in the cookie
$cartItems = getCartFromCookie();

// You can then use $cartItems to display the cart contents in your HTML
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


    <!--Cart-->
    <section class="cart container mt-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>


            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>


                <?php foreach ($_SESSION['cart'] as $Key => $value) {
                ?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="assets/images/<?php echo $value['product_image']; ?>" />
                                <div>
                                    <p><?php echo $value['product_name']; ?></p>
                                    <small><span></span><?php echo $value['product_price']; ?></small>
                                    <br>
                                    <form method="POST" action="cart.php">
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                        <input type="submit" name="remove_product" class="remove-btn" value="remove" />
                                    </form>
                                </div>
                            </div>
                        </td>



                        <td>

                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>" />
                                <input type="submit" class="edit-btn" value="edit" name="edit_quantity" />
                            </form>
                        </td>

                        <td>
                            <span>$</span>
                            <span class="product-price"><?php echo intval($value['product_quantity']) * floatval($value['product_price']); ?></span>
                        </td>
                    </tr>

                <?php } ?>


                <tr>
                    <td colspan="2">
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="action" value="clear_cart" />
                            <button type="submit" class="btn btn-success">Delete Items</button>
                        </form>
                    </td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td colspan="3">Empty Cart</td>
                </tr>
            <?php } ?>



        </table>

        <div class="cart-total">
            <table>
                <tr>
                <tr>
                    <td>
                        Total
                    </td>
                    <?php if (isset($_SESSION['cart'])) { ?>
                        <td>
                            $<?php echo $_SESSION['total']; ?>
                        </td>

                    <?php } ?>
                </tr>
            </table>
        </div>



        <div class="checkout-container">
            <form method="POST" action="checkout.php">
                <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
            </form>
        </div>


    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var checkoutBtn = document.querySelector('.checkout-btn');

            function updateCheckoutBtnStatus() {
                checkoutBtn.disabled = <?php echo isCartEmpty() ? 'true' : 'false'; ?>;
            }

            updateCheckoutBtnStatus();


            window.addEventListener('cartUpdated', function() {
                updateCheckoutBtnStatus();
            });
        });
    </script>


</body>

</html>