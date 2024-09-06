<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
$Selquery="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=$con->query($Selquery);
$data=$row->fetch_assoc()




?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FitSeeker::My Profile</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
  }

  .containers {
    width: 80%;
    max-width: 900px;
    margin: 2rem auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 2rem;
  }

  .profile-header {
    text-align: center;
    margin-bottom: 2rem;
  }

  .profile-header img {
    border-radius: 50%;
    border: 2px solid #007BFF;
    width: 120px; /* Adjust the width */
    height: 120px; /* Adjust the height */
    object-fit: cover; /* Ensures the image covers the specified dimensions */
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    padding: 1rem;
    text-align: left;
  }

  th {
    background-color: #007BFF;
    color: #fff;
    font-weight: bold;
  }

  td {
    background-color: #f9f9f9;
  }

  tr:nth-child(even) td {
    background-color: #f1f1f1;
  }

  .actions {
    text-align: center;
    margin-top: 1rem;
  }

  .actions a {
    color: #007BFF;
    text-decoration: none;
    margin: 0 1rem;
    font-weight: bold;
  }

  .actions a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="containers">
  <div class="profile-header">
    <img src="../Assets/Files/Userdocs/<?php echo $data["user_photo"] ?>" alt="Profile Photo">
  </div>

  <table>
    <tr>
      <th colspan="2">Profile Information</th>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"] ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"] ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"] ?></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><?php echo $data["user_dob"] ?></td>
    </tr>
  </table>

  <div class="actions">
    <a href="Editprofile.php">Edit Profile</a>
    <a href="Changepassword.php">Change Password</a>
  </div>
</div>

</body>
</html>



<?php
include('Footer.php');
?>