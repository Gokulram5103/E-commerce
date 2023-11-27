<?php

include "authguard.php";
$pid=$_GET['pid'];
$userid=$_SESSION['userid'];

include "../shared/connection.php";

$status=mysqli_query($conn,"insert into cart(userid,pid) values($userid,$pid)");
if($status){
    echo "Product added to cart successfully!";
}
else{
    echo "Error while adding to cart";
    mysqli_error($conn);
}

?>