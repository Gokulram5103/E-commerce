<?php

$uname=$_POST['uname'];
$upass=$_POST['pass1'];
$utype=$_POST['usertype'];

include "connection.php";
// $conn=new mysqli("localhost","root","","acme23_aug");
$status=mysqli_query($conn,"insert into user(username,password,usertype) values('$uname','$upass','$utype')");
if($status){
    echo "User Signup Success";
}
else{
    echo 'Signup Failed';
    echo mysqli_error($conn);
}

?>