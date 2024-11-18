<?php
$con = mysqli_connect("localhost", "root", "", "ecommerce"); // Database connection

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Check if product_id is set in the URL
if (isset($_GET['pro_id'])) {
    $product_id = $_GET['pro_id'];
    // Fetch product details based on the product_id
    $get_pro = "SELECT * FROM product WHERE product_id='$product_id'"; // Use WHERE clause
    $run_pro = mysqli_query($con, $get_pro);

    // Check if there are results
    if (mysqli_num_rows($run_pro) > 0) {
        while ($row_pro = mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];
            $pro_desc = $row_pro['product_desc']; // Get product description

            echo "
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='400' height='300'/> <!-- Main image -->
                <img src='admin_area/product_images/$pro_image' width='180' height='180'/> <!-- Thumbnail image -->
                <p><b>$$pro_price</b></p>
                <p>$pro_desc</p> <!-- Display product description -->
                <a href='index.php' style='float:left;'>Go Back</a>
                <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
            </div>
            ";
        }
    } else {
        echo "<p>Product not found.</p>";
    }
} else {
    echo "<p>No product selected.</p>";
}
?>
