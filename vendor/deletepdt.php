<?php

include "authguard.php";

$pid=$_GET['pid'];

include "../shared/connection.php";

$status=mysqli_query($conn,"delete from product where pid=$pid");
if($status){
    echo "Product deleted successfully!";
    header("location:view.php");
}
else{
    echo "Error while deleting the product";
    echo mysqli_error(($conn)); 
}

?>