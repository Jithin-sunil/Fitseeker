
<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
if(isset($_GET["shiID"]))
	{
		$bookingstatus=$_GET["shiID"];
		$acpqry="update tbl_booking set booking_status='3' where booking_status=$bookingstatus";
	if($con-> query($acpqry))
	{
		?>
        <script>
            alert("Shipped");
            window.location="viewbookings.php";
        </script>
        <?php
		// echo "Shipped";
		// header("location:viewbookings.php");
	}
}
if(isset($_GET["deiID"]))
	{
		$bookingstatus=$_GET["deiID"];
		$acpqry="update tbl_booking set booking_status='4',delivery_date=curdate() where booking_status=$bookingstatus";
	if($con-> query($acpqry))
	{
		?>
        <script>
            alert("Deilvered");
            window.location="viewbookings.php";
        </script>
        <?php
		// echo "Deilvered";
		// header("location:viewbookings.php");
	}
}	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::View Bookings</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
    }

    .bookings-table {
        max-width: 800px;
        width: 100%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .bookings-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .bookings-table th, .bookings-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    .bookings-table th {
        background-color: #f2f2f2;
    }

    .bookings-table a {
        text-decoration: none;
        color: #2196F3;
    }

    .bookings-table a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>

<div class="bookings-table">
    <h2>View Bookings</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Booking Date</th>
            <th>User Name</th>
            <th>Status</th>
        </tr>
        <?php
        $selqurey="select * from tbl_cart r  inner join tbl_product c on r.product_id=c.product_id inner join tbl_booking o on r.booking_id=o.booking_id inner join tbl_user u on o.user_id=u.user_id where seller_id='".$_SESSION["sid"]."'" ;
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
        {
            $i++;
        ?>
        <tr>
            <td><?php echo $data["product_name"]?></td>
            <td><?php echo $data["booking_date"]?></td>
            <td><?php echo $data["user_name"]?></td>
            <td>
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
                    ?>
                    <a href="viewbookings.php?shiID=<?php echo $data["booking_status"]?>">Shipped</a>
                    <?php
                }
                else if($data['booking_status']=='3')
                {
                    echo 'Shipped';
                    ?>
                    <a href="viewbookings.php?deiID=<?php echo $data["booking_status"]?>">Delivered</a>
                    <?php
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
                
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>

</body>
</html>


<?php
include('Footer.php');
?>