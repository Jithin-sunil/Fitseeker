<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::View Complaint</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
    }

    .complaint-table {
        max-width: 800px;
        width: 100%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .complaint-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .complaint-table th, .complaint-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    .complaint-table th {
        background-color: #f2f2f2;
    }

    .complaint-table a {
        text-decoration: none;
        color: #2196F3;
    }

    .complaint-table a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>

<div class="complaint-table">
    <h2>View Complaints</h2>
    <table>
        <tr><BR>
            <th>Complaint <br> Title</th>
            <th>Complaint</th>
            <th>Complaint <br> Date</th>
            <th>User <br> Name</th>
            <th>Product <br> Name</th>
            <th>Reply</th>
        </tr>
        <?php
        $selqurey="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_product p on c.product_id=p.product_id";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
        {
            $i++;
        ?>
        <tr>
            <td><?php echo $data["complaint_title"]?></td>
            <td><?php echo $data["complaint_complaint"]?></td>
            <td><?php echo $data["complaint_date"]?></td>
            <td><?php echo $data["user_name"]?></td>
            <td><?php echo $data["product_name"]?></td>
            <td>
                <?php
                if($data['complaint_status']=='0')
                {
                    ?>
                    <a href="Reply.php?rid=<?php echo $data ["complaint_id"]?>">Reply</a>
                    <?php
                }
                else if ($data['complaint_status']=='1')
                {
                    echo 'Already Replayed';
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