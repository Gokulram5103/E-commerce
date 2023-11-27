
<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

$userid=$_SESSION['userid'];

$sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid  where userid=$userid");

$total=0;
while($row=mysqli_fetch_assoc($sql_result)){
   
    $total+=$row['price'];
    echo "<div class='card-box'>
                <div class='name'>$row[name]</div>
                <div class='price'>$row[price]</div>
                <div class='pdt-img'>
                    <img src='$row[impath]'>
                </div>
                <div class='detail'>$row[detail]</div>  
                <hr>
                <div class='action'>                    
                    <a href='removecart.php?pid=$row[pid]'>
                        <button class='btn btn-danger'>Remove from cart</button>
                    </a>
                </div>  
    </div>";

    
}

echo "<div>
        <h1>Place Order</h1>
        <form action='placeorder.php' method='post'>
            <input type='hidden' name='total_amount' value='$total'>
            <button type='submit' class='btn btn-success'>Pay Rs. $total</button>
        </form>
      </div>";




?>