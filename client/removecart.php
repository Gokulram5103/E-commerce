<?php
include "authguard.php";
include "../shared/connection.php";

$userid = $_SESSION['userid'];

if(isset($_GET['pid'])){
    $product_id = $_GET['pid'];

    $status = mysqli_query($conn, "DELETE FROM cart WHERE userid=$userid AND pid=$product_id");

    if($status){
        echo "Product removed from cart successfully!";
        header("location:viewcart.php");
    } else {
        echo "Error while removing product from cart";
        echo mysqli_error($conn);
    }
} else {
    echo 'Product ID not provided.';
}
?>
