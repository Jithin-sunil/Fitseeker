<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-content: space-around;
    flex-direction: column;
        }
        table {
            width: 90%;
            max-width: 800px;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        thead {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #eaeaea;
            transition: background-color 0.3s ease-in-out;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }
        }
    </style>
    <title>Complaint Table</title>
</head>
<body>

<table align="center">
    <thead>
        <tr>
            <th>Complaint Title</th>
            <th>Complaint</th>
            <th>Complaint Date</th>
            <th>Product Name</th>
            <th>Complaint Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selqurey = "select * from tbl_complaint c 
                      inner join tbl_user u on c.user_id=u.user_id 
                      inner join tbl_product p on c.product_id=p.product_id";
        $result = $con->query($selqurey);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $data["complaint_title"] ?></td>
            <td><?php echo $data["complaint_complaint"] ?></td>
            <td><?php echo $data["complaint_date"] ?></td>
            <td><?php echo $data["product_name"] ?></td>
            <td>
                <?php
                if ($data['complaint_status'] == '0') {
                    echo 'Pending';
                } elseif ($data['complaint_status'] == '1') {
                ?>
                    <a href="viewreply.php">View Reply</a>
                <?php
                } else {
                    echo 'Complaint Rejected';
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
include('Footer.php');
?>