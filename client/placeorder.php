<?php
include "authguard.php";
include "../shared/connection.php";

$userid = $_SESSION['userid'];
$total_amount = $_POST['total_amount'];

$cart_result = mysqli_query($conn, "SELECT * FROM cart WHERE userid=$userid");
if (mysqli_num_rows($cart_result) == 0) {
    echo "Cannot place an order with an empty cart.";
    exit(); // Exit the script if the cart is empty
}

$status = mysqli_query($conn, "INSERT INTO orders (userid, total_amount) VALUES ($userid, $total_amount)");

if($status){
    // Clear the cart after placing the order
    $delete_cart_status = mysqli_query($conn, "DELETE FROM cart WHERE userid = $userid");
    
    if($delete_cart_status){
        echo "Order placed successfully!";
    } else {
        echo "Order placed, but there was an error clearing the cart.";
    }
} else {
    echo "Error placing the order.";
    echo mysqli_error($conn);
}
?>
