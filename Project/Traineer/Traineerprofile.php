<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');

$Selquery="select * from tbl_traineer where traineer_id='".$_SESSION["tid"]."'";
$row=$con->query($Selquery);
$data=$row->fetch_assoc()




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Trainer Profile</title>
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

.profile-container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px;
    width: 100%;
}

.profile-header {
    display: flex;
    align-items: center;
    border-bottom: 2px solid #1976d2;
    padding-bottom: 15px;
    margin-bottom: 20px;
}

.profile-header img {
    border-radius: 50%;
    margin-right: 20px;
    border: 3px solid #1976d2;
    width: 120px;
    height: 120px;
    object-fit: cover;
}

.profile-header h1 {
    color: #1976d2;
    margin: 0;
    font-size: 24px; /* Added font size */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px; /* Added margin bottom */
}

td {
    padding: 10px;
    vertical-align: top;
}

th {
    padding: 10px;
    text-align: left;
    background-color: #1976d2;
    color: #ffffff;
    font-weight: bold;
}

a {
    color: #1976d2;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 15px;
    border: 1px solid #1976d2;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
    font-size: 16px; /* Added font size */
}

a:hover {
    background-color: #1976d2;
    color: #ffffff;
}

a + a {
    margin-left: 10px;
}

.profile-actions {
    display: flex; /* Added display flex */
    justify-content: space-between; /* Added justify content */
}
table {
    width: 100%;
    border-collapse: separate; /* Changed from collapse to separate */
    border-spacing: 0 10px; /* Added border-spacing */
    margin-bottom: 20px;
}
</style>
</head>
<body>

<div class="profile-container">
    <div class="profile-header">
        <img src="../Assets/Files/Traineerdocs/Image/<?php echo $data["traineer_photo"] ?>" alt="Profile Photo">
        <h1><?php echo $data["traineer_name"] ?></h1>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <td><?php echo $data["traineer_name"] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $data["traineer_email"] ?></td>
        </tr>
        <tr>
            <th>Contact</th>
            <td><?php echo $data["traineer_contact"] ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $data["traineer_address"] ?></td>
        </tr>
    </table>
    <br>

    <div class="profile-actions">
        <a href="EditPROFILE.php">Edit Profile</a>
        <a href="ChangePASSWORD.php">Change Password</a>
    </div>
</div>

</body>
</html>



<?php
include('Footer.php');
?>