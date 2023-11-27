<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

$pid = $_GET['pid'];


$sql_result = mysqli_query($conn, "SELECT * FROM product WHERE pid=$pid");
$row = mysqli_fetch_assoc($sql_result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];

    $update_query = "UPDATE product SET name='$name', price='$price', detail='$detail' WHERE pid=$pid";
    $status = mysqli_query($conn, $update_query);

    if ($status) {
        echo "Product Updated Successfully!";
        header("Location: view.php"); 
        exit();
    } else {
        echo "Error while updating product";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <style>
        

body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5; 
}

.form-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff; 
    border-radius: 10px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.form-group {
    margin-bottom: 20px; 
}

label {
    font-weight: bold;
    display: block; 
    margin-bottom: 5px; 
}

input, textarea {
    width: calc(100% - 16px); 
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px; 
}

button {
    padding: 12px 24px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s; 
}

button:hover {
    background-color: #0056b3;
}

button, input[type="file"] {
    margin-top: 10px; 
}

button, input[type="file"], textarea {
    outline: none; 
}

textarea {
    height: 150px; 
}



input:focus, textarea:focus {
    border-color: #007bff; 
}

::-webkit-file-upload-button {
    font-size: 16px; 
    padding: 10px 20px; 
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s; 
}

::-webkit-file-upload-button:hover {
    background-color: #0056b3;
}

    </style>

    <div class="form-container">
        <h2>Edit Product</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" value="<?php echo $row['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="detail">Detail:</label>
                <textarea name="detail" required><?php echo $row['detail']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

</body>
</html>
