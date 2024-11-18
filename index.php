<?php
// Include the functions file
include('functions/functions.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-Commerce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main_wrapper">
        <!-- Menubar Section -->
        <div class="menubar">
            <div id="menu">
                <a href="index.php">Home</a>
                <a href="all_products.php">All Products</a>
                <a href="my_account.php">My Account</a>
                <a href="sign_up.php">Sign Up</a>
                <a href="cart.php">Shopping Cart</a>
                <a href="contact_us.php">Contact Us</a>
            </div>
        </div>

        <!-- Form Section -->
        <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search a Product"/>
                <input type="submit" name="search" value="Search"/>
            </form>
        </div>

        <!-- Content Wrapper -->
        <div class="content_wrapper">
            <!-- Sidebar Section -->
            <div id="sidebar">
                <h2>Categories</h2>
                <ul>
                    <?php getCats(); ?> <!-- Display categories -->
                </ul>
                <h2>Brands</h2>
                <ul>
                    <?php getBrands(); ?> <!-- Display brands -->
                </ul>
            </div> 

            <!-- Content Area Section -->
            <div id="content_area">
                <div id="shopping_cart">
                    <span>
                        Welcome Guest! <b>Shopping Cart -</b> Total items: <span id="total_items">0</span> - Total Price: <span id="total_price">$0.00</span> <a href="cart.php">Go to Cart</a>
                    </span>
                </div>
                <div id="product_box">
                    <?php 
                    // Display products based on selected category or brand
                    if (isset($_GET['cat'])) {
                        getCatPro(); // Get products by category
                    } elseif (isset($_GET['brand'])) {
                        getBrandPro(); // Get products by brand
                    } else {
                        getPro(); // Default to get random products
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div id="footer">
            <h2>&copy; 2016 by The Webmaster</h2>
        </div>
    </div>
</body>
</html>
