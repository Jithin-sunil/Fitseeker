<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
    <title>FitSeeker::MyChat</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        td img {
            border-radius: 50%;
            height: 80px;
            width: 80px;
            object-fit: cover;
        }
        .btn-chat {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-chat:hover {
            background-color: #218838;
            text-decoration: none;
            color: #fff;
        }
        .no-chats {
            margin-top: 30px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Chats</h1>
        <form id="form1" name="form1" method="post" action="">
            <?php
            $viewqry="select DISTINCT user_id, user_photo, user_name from tbl_schat c INNER JOIN tbl_user u on c.schat_fromuid=u.user_id where schat_tosid='".$_SESSION['tid']."'";
            $result=$con->query($viewqry);
            if($result->num_rows > 0) {
                $i = 0;
            ?> 
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Photo</th>
                        <th>Sender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()) { $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><img src="../Assets/Files/Userdocs/<?php echo $row["user_photo"]; ?>" alt="User Photo"></td>
                        <td><?php echo $row["user_name"]; ?></td>
                        <td><a href="SChat.php?id=<?php echo $row['user_id']; ?>" class="btn btn-chat">Chat</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            } else {
                echo "<div class='no-chats'><h3>No Chats Found</h3></div>";
            } ?>
        </form>
    </div>
</body>
</html>



<?php
include('Footer.php');
?>