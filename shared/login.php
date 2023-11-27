<?php

session_start();
$_SESSION['login_status']=false;


$uname=$_POST['uname'];
$upass=$_POST['upass'];


include "connection.php";
// $conn=new mysqli("localhost","root","","acme23_aug");
$sql_obj=mysqli_query($conn,"select * from user where username='$uname' and password='$upass'");

$no_of_rows=mysqli_num_rows($sql_obj);
$row=mysqli_fetch_assoc($sql_obj);

if($no_of_rows>0){
    $_SESSION['login_status']=true;
    $_SESSION['usertype']=$row['usertype'];
    $_SESSION['userid']=$row['userid'];
    $_SESSION['username']=$row['username'];

    echo "Login Success";    
    if($row['usertype']=='Vendor'){        

        header("location:../vendor/home.php");
    }
    else if($row['usertype']=='Customer'){
        header("location:../client/home.php");
    }

}
else{
    echo '<h1>Invalid Credentials</h1>';    
}

?>