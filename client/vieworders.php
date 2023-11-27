<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

$userid = $_SESSION['userid'];

$sql_result = mysqli_query($conn, "SELECT * FROM orders WHERE userid=$userid");

if (mysqli_num_rows($sql_result) > 0) {
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Amount (Rs.)</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_assoc($sql_result)) {
        echo "<tr>
                <td>$row[oid]</td>
                <td>Rs. $row[total_amount]</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No orders found.";
}
?>
