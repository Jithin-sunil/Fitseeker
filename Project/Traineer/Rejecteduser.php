<?php

include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_GET["acpID"]))
	{
		$requestid=$_GET["acpID"];
		$acpqry="update tbl_request set request_status='1' where request_id=$requestid";
	if($con-> query($acpqry))
	{
        ?>
        <script>
            alert("Accepted");
            window.location="Rejecteduser.php";
        </script>
        <?php
		// echo "Accepted";
		// header("location:Rejecteduser.php");
	}
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Rejected Users</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f4f8;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-content: space-around;
    flex-direction: column;
}

h1 {
    color: #1976d2;
    margin-bottom: 20px;
}

.table-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
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

tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #1976d2;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

button {
    background-color: #1976d2;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    margin: 10px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #1565c0;
}

button:active {
    background-color: #0d47a1;
}

.navigation-buttons {
    margin: 20px 0;
}
</style>
</head>

<body>
<h1>Rejected Users</h1>
<div class="table-container">
    <table>
        <tr>
            <th>Slno</th>
            <th>Username</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Course Type</th>
            <th>Course</th>
            <th>Course Details</th>
            <th>Action</th>
        </tr>
        <?php
        $selqurey="SELECT * FROM tbl_request r 
                   INNER JOIN tbl_user u ON r.user_id = u.user_id 
                   INNER JOIN tbl_course c ON r.course_id = c.course_id 
                   INNER JOIN tbl_coursetype t ON c.coursetype_id = t.coursetype_id 
                   WHERE request_status='2' and traineer_id='".$_SESSION["tid"]."'";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
        {
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data["user_name"] ?></td>
            <td><?php echo $data["user_email"] ?></td>
            <td><?php echo $data["user_contact"] ?></td>
            <td><?php echo $data["coursetype_name"] ?></td>
            <td><?php echo $data["course_name"] ?></td>
            <td><?php echo $data["course_details"] ?></td>
            <td><a href="Accepteduser.php?acpID=<?php echo $data["request_id"] ?>">Accept</a></td>
        </tr>
        <?php
        } 
        ?>
    </table>
</div>

<div class="navigation-buttons">
    <a href="Requesteduser.php"><button>View Requested Users</button></a>
    <a href="Accepteduser.php"><button>View Accepted Users</button></a>
</div>

</body>
</html>


<?php
include('Footer.php');
?>