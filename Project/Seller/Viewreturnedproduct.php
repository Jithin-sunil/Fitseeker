<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-content: space-around;
    flex-direction: column;
        }

        .containers {
            width: 90%;
            max-width: 1200px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td img {
            border-radius: 8px;
            width: 100px; /* Adjusted width */
            height: 100px; /* Adjusted height */
            object-fit: cover; /* Ensures the image covers the area without distortion */
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .verified {
            color: green;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            table, th, td {
                font-size: 12px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="containers">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Return Description</th>
                <th>Returned Image</th>
                <th>User Name</th>
                <th>Status</th>
            </tr>
            <?php
            $selqurey="select * from tbl_returnproduct r inner join tbl_cart c on r.cart_id=c.cart_id inner join tbl_product p on c.product_id=p.product_id inner join tbl_seller s on p.seller_id=s.seller_id inner join tbl_user u on r.user_id=u.user_id where s.seller_id='".$_SESSION["sid"]."'" ;
            $result=$con->query($selqurey);
            while($data=$result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $data["product_name"] ?></td>
                <td><?php echo $data["return_discription"] ?></td>
                <td><img src="../Assets/Files/Returnproducts/<?php echo $data["return_image"] ?>" /></td>
                <td><?php echo $data["user_name"] ?></td>
                <td>
                    <?php if($data['return_status'] == '0') { ?>
                    <a href="SendMail.php?id=<?php echo $data['user_id'] ?>&shiID=<?php echo $data["return_id"] ?>">Send Mail</a>
                    <?php } else if($data['return_status'] == '1') { ?>
                    <span class="verified">Verified</span>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>



<?php
include('Footer.php');
?>