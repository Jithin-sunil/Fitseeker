<?php

include('../Assets/Connection/Connection.php');

// session_start();
include('Header.php');
if(isset($_GET['rid']))
{
			$insQry="insert into tbl_request(course_id,user_id,request_date) values('".$_GET['rid']."','".$_SESSION['uid']."',curdate())";
			$con->query($insQry)
			
				?>
            	<script>
				alert("Requested")
                window.location = "Viewtraineer.php";
				</script>
           		 <?php
}
			
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::View Course</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-content: space-around;
    flex-direction: column;
}

button {
    background-color: #1976d2;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    margin-bottom: 20px;
    transition: background-color 0.3s, color 0.3s;
}

button:hover {
    background-color: #1565c0;
}

button:active {
    background-color: #0d47a1;
}

button:focus {
    outline: none;
}

table {
    width: 100%;
    max-width: 800px;
    border-collapse: collapse;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #1976d2;
    color: #ffffff;
    font-weight: bold;
}

td {
    background-color: #ffffff;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}
</style>
</head>

<body>
<table>
    <thead>
        <tr>
            <th>Course Type</th>
            <th>Course</th>
            <th>Course Details</th>
            <th>Request Trainee</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selqurey="select * from tbl_course u inner join tbl_coursetype p on u.coursetype_id = p.coursetype_id where traineer_id='".$_GET["cid"]."'";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
        {
            $i++;
            ?>
            <tr>
                <td><?php echo htmlspecialchars($data["coursetype_name"]) ?></td>
                <td><?php echo htmlspecialchars($data["course_name"]) ?></td>
                <td><?php echo htmlspecialchars($data["course_details"]) ?></td>
                <td>
                    <form action="viewcourse.php" method="get">
                        <input type="hidden" name="rid" value="<?php echo htmlspecialchars($data["course_id"]) ?>" />
                        <button type="submit">Request</button>
                    </form>
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