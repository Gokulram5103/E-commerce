<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

$userid=$_SESSION['userid'];

$sql_result=mysqli_query($conn,"SELECT * FROM product WHERE uploaded_by=$userid");

echo "<table class='table'>
        <thead>
            <tr>
                <th>Pid</th>
                <th>Name</th>
                <th>Price (Rs.)</th>
                <th>Image</th>
                <th>Detail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_assoc($sql_result)){
    echo "<tr>
            <td>$row[pid]</td>
            <td>$row[name]</td>
            <td>Rs. $row[price]</td>
            <td><img src='$row[impath]' style='max-width:100px; max-height:100px;'></td>
            <td>$row[detail]</td>
            <td>
                <a href='editproduct.php?pid=$row[pid]' class='btn btn-warning'>Edit</a>
                <a href='deletepdt.php?pid=$row[pid]' class='btn btn-danger'>Delete</a>
            </td>
          </tr>";
}

echo "</tbody></table>";

?>
