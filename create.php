<?php
include "connection.php";

if (isset($_POST['submit'])) {
    // Convert input values to appropriate types
    $product_id = intval($_POST['product_id']);
    $total_price = floatval($_POST['total_price']);
    $base_price = floatval($_POST['base_price']);
    $units_available = intval($_POST['units_available']);
    $product_name = $_POST['product_name'];

    // Insert data into the database
    $q = "INSERT INTO `product`(`product_id`, `total_price`, `base_price`,`units_available`,`product_name`) VALUES ('$product_id', '$total_price', '$base_price', '$units_available', '$product_name')";
    
    $query = mysqli_query($conn, $q);

    // Check for database query errors
    if (!$query) {
        die("Error: " . mysqli_error($conn));
    }else{
        header("location: first_page.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="first_page.php">Smart Inventory Management</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="first_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="btn custom-link-stock nav-link active" href="http://127.0.0.1:5000">Check your stock</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <br><br>
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center"> Add New Product </h1>
                </div>
                <br>

                <label> Product ID: </label>
                <input type="text" name="product_id" class="form-control"> <br>

                <label> Total Price: </label>
                <input type="text" name="total_price" class="form-control"> <br>

                <label> Base Price: </label>
                <input type="text" name="base_price" class="form-control"> <br>

                <label> Units Available: </label>
                <input type="text" name="units_available" class="form-control"> <br>

                <label> Product Name: </label>
                <input type="text" name="product_name" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="first_page.php"> Cancel </a><br>
            </div>
        </form>
    </div>
</body>
</html>
