<?php
$conn=new mysqli("localhost","root","","acme23_aug");
if($conn->connect_error){
    echo "SQL Connection Failed";
    die;
}
else{
    echo "Success : 202";
}
?>