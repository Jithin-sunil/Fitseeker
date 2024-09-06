<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::MyBooking</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-content: space-around;
        flex-direction: column;
    }

    .booking-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1200px;
        width: 100%;
    }

    .booking-box {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        border: 1px solid #ddd;
    }

    .booking-box img {
        max-width: 100px;
        height: auto;
        margin-bottom: 15px;
    }

    .booking-box h3 {
        margin: 10px 0;
        font-size: 18px;
        color: #333;
    }

    .booking-box p {
        margin: 5px 0;
        font-size: 14px;
        color: #666;
    }

    .booking-box .status {
        font-weight: bold;
        margin-top: 10px;
        color: #4CAF50; /* Green */
    }

    .booking-box .actions a {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 12px;
        background-color: #2196F3; /* Blue */
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
    }

    .booking-box .actions a:hover {
        background-color: #0d8bf2; /* Darker Blue */
    }
</style>
</head>

<body>

<div class="booking-container">
    <?php
    $selqurey="select * from tbl_cart r  inner join tbl_product c on r.product_id=c.product_id inner join tbl_booking o on r.booking_id=o.booking_id where user_id='".$_SESSION['uid']."' ORDER BY o.booking_date ASC " ;
    $result=$con->query($selqurey);
    $i=0;
    while($data=$result->fetch_assoc())
    {
        $i++;
    ?>
        <div class="booking-box">
            <img src="../Assets/Files/Product/<?php echo $data["product_image"] ?>" alt="Product Image" />
            <h3><?php echo $data["product_name"]?></h3>
            <p>Price: $<?php echo $data["product_price"]?></p>
            <p>Quantity: <?php echo $data["cart_quantity"]?></p>
            <p>Booking Date: <?php echo $data["booking_date"]?></p>
            <p class="status">
                <?php
                if($data['booking_status']=='0')
                {
                    echo 'Pending';
                }
                else if($data['booking_status']=='1')
                {
                    echo 'Accepted';
                }
                else if($data['booking_status']=='2')
                {
                    echo 'Payment completed';
                }
                else if($data['booking_status']=='3')
                {
                    echo 'Shipped';
                }
                else if($data['booking_status']=='4')
                {
                    echo 'Delivered';
                }
                else
                {
                    echo 'Rejected';
                }
                ?>
            </p>
            <div class="actions">
                <?php if($data['booking_status']=='4')
                 { 

                    ?>
                    <a href="Complaint.php?cid=<?php echo $data["product_id"]?>">Complaint</a>
                    <a href="Rating.php?cid=<?php echo $data["product_id"]?>">Rating</a>
                    <!-- <a href="ReturnProduct.php?sid=<?php echo $data["cart_id"]?>">Return</a> -->
                    <?php

$orderCompletionDate = $data["delivery_date"]; 
$currentDate = date('Y-m-d');
$diff = (strtotime($currentDate) - strtotime($orderCompletionDate)) / (60 * 60 * 24);
if ($diff <= 7) {
    echo '<a href="ReturnProduct.php?sid=' . $data["cart_id"] . '">Return</a>';
} else {
    // echo '<span style="color:gray;">Return (disabled)</span>'; 
}

                } 
                ?>
            </div>
        </div>
    <?php
    } 
    ?>
</div>

</body>
</html>

<?php
include('Footer.php');
?>