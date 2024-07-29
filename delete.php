<?php
    include "connection.php";
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $sql = "DELETE from `product` where product_id=$product_id";
        $conn->query($sql);
    }
    header("location: first_page.php");
    exit;
?>
