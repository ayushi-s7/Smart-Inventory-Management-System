<?php
  include "connection.php";
  $product_id="";
  $total_price="";
  $base_price="";
  $units_available="";
  $product_name="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['product_id'])){
      header("location: first_page.php");
      exit;
    }
    $product_id = $_GET['product_id'];
    $sql = "select * from product where product_id=$product_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: first_page.php");
      exit;
    }
    $product_id=$row["product_id"];
    $total_price=$row["total_price"];
    $base_price=$row["base_price"];
    $units_available=$row["units_available"];
    $product_name=$row["product_name"];

  }
  else{
    $product_id = $_POST["product_id"];
    $total_price=$_POST["total_price"];
    $base_price=$_POST["base_price"];
    $units_available=$_POST["units_available"];
    $product_name=$_POST["product_name"];

    $sql = "update product set product_id='$product_id', total_price='$total_price', base_price='$base_price', units_available='$units_available', product_name='$product_name' where product_id='$product_id'";
    $result = $conn->query($sql);
    header("location: first_page.php");
    exit;
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="first_page.php">Smart Inventory Management</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="first_page.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Product </h1>
 </div><br>

 <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" class="form-control"> <br>

 <label> Product ID: </label>
 <input type="text" name="product_id" value="<?php echo $product_id; ?>" class="form-control"> <br>

 <label> Total Price: </label>
 <input type="text" name="total_price" value="<?php echo $total_price; ?>" class="form-control"> <br>

 <label> Base Price </label>
 <input type="text" name="base_price" value="<?php echo $base_price; ?>" class="form-control"> <br>

 <label> Units Available: </label>
 <input type="text" name="units_available"  value="<?php echo $units_available; ?>" class="form-control"> <br>

 <label> Product Name: </label>
 <input type="text" name="product_name"  value="<?php echo $product_name; ?>" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="first_page.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>
