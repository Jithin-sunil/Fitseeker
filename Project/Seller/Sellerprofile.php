<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
$Selquery="select * from tbl_seller where seller_id='".$_SESSION["sid"]."'";
$row=$con->query($Selquery);
$data=$row->fetch_assoc()
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FitSeeker::Sellerprofile</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .containers {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
        }
        th {
            text-align: center;
        }
        td img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .profile-data {
            color: #555;
        }
        .btn-group {
            text-align: center;
            margin-top: 20px;
        }
        .btn-group a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
        }
        .btn-group a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="containers">
        <h1>My Profile</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <th colspan="2"><img src="../Assets/Files/Sellerdocs/<?php echo $data["seller_image"] ?>" alt="Seller Image"></th>
                </tr>
                <tr>
                    <td class="profile-label">Name</td>
                    <td class="profile-data"><?php echo $data["seller_name"] ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Email</td>
                    <td class="profile-data"><?php echo $data["seller_email"] ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Contact</td>
                    <td class="profile-data"><?php echo $data["seller_contact"] ?></td>
                </tr>
                <tr>
                    <td class="profile-label">Address</td>
                    <td class="profile-data"><?php echo $data["seller_address"] ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="btn-group">
                        <a href="EditProfile.php">Edit Profile</a>
                        <a href="ChangePassword.php">Change Password</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>



<?php
include('Footer.php');
?>