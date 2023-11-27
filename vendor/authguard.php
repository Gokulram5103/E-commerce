
<?php

session_start();

if(!isset($_SESSION['login_status'])){
    echo "Login Skipped, Please login  first!!";
    die;
}

if($_SESSION['login_status']==false)
{
    echo "Forbidden Access, Login First";
    die;
}

if($_SESSION['usertype']!="Vendor"){
    echo "Only Vendors can Access this Page";
    die;
}

echo "<div class='d-flex justify-content-evenly bg-primary text-white p-3'>

    <div>#$_SESSION[userid]</div>
    <div>$_SESSION[username]</div>
    <div>$_SESSION[usertype]</div>
    <div>
        <a href='../shared/logout.php'>
            <button class='btn btn-warning'>Logout</button>
        </a>
    </div>

</div>";

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
</html>