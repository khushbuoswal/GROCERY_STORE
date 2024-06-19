<?php

session_start();

if (!empty($_SESSION['cart'])) {
} else {
    header('location: index.php');
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




    <!--checkout-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="max-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="server/order.php">
                <p class="text-center" style="color: red;">
                    <?php if (isset($_GET['message'])) {
                        echo $_GET['message'];
                    } ?>
                    <?php if (isset($_GET['message'])) { ?>
                        <a href="login.php" class="btn btn-success">Login</a>
                    <?php } ?>
                </p>

                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="email" class="form-control" id="checkout-email" name="email" placeholder="Email" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label>Phone </label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label>City </label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label>
                        Address
                    </label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label for="checkout-street">Street</label>
                    <input type="text" class="form-control" id="checkout-street" name="street" placeholder="Street" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label for="checkout-city-suburb">Suburb</label>
                    <input type="text" class="form-control" id="checkout-city-suburb" name="city_suburb" placeholder="Suburb" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label for="checkout-state">State/Territory</label>
                    <select class="form-select" id="checkout-state" name="state" required>
                        <option value="" disabled selected>Select State/Territory</option>
                        <option value="NSW">New South Wales</option>
                        <option value="VIC">Victoria</option>
                        <option value="QLD">Queensland</option>
                        <option value="WA">Western Australia</option>
                        <option value="SA">South Australia</option>
                        <option value="TAS">Tasmania</option>
                        <option value="ACT">Australian Capital Territory</option>
                        <option value="NT">Northern Territory</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total amount: $ <?php echo $_SESSION['total']; ?> </p>
                    <input type="submit" class="btn" id="checkout-btn" name="order" value="Order" />
                </div>
            </form>

        </div>
    </section>

    <script>
        function validateForm() {
            var email = document.getElementById("checkout-email").value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }
            return true; // Form submission allowed
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("checkout-form");
            var placeOrderBtn = document.getElementById("checkout-btn");

            function checkFormValidity() {
                var name = document.getElementById("checkout-name").value;
                var email = document.getElementById("checkout-email").value;
                var phone = document.getElementById("checkout-phone").value;
                var address = document.getElementById("checkout-address").value;
                var street = document.getElementById("checkout-street").value;
                var citySuburb = document.getElementById("checkout-city-suburb").value;
                var state = document.getElementById("checkout-state").value;

                if (name && email && phone && address && street && citySuburb && state) {
                    placeOrderBtn.removeAttribute("disabled");
                } else {
                    placeOrderBtn.setAttribute("disabled", "disabled");
                }
            }

            form.addEventListener("input", checkFormValidity);
            form.addEventListener("change", checkFormValidity);


        });
    </script>
</body>

</html>