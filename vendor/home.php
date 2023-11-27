
<?php
include "authguard.php";
include "menu.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>   

</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form action="add.php" method="post" class="bg-warning p-4" enctype="multipart/form-data">

        <input type="text" name="name" class="form-control mt-2" placeholder="Product Name">
        <input type="number" name="price" class="form-control mt-2" placeholder="Product Price">
        <textarea name="detail" id="" cols="30" rows="5" class="form-control mt-2" placeholder="Product Description"></textarea>
        <input type="file" name="pdtimg" class="form-control mt-2">

        <div class="text-center mt-3">
            <button class="btn btn-success">Upload</button>
        </div>

    </form>

</div>

</body>
</html>