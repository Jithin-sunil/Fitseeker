<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
$Selquery="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=$con->query($Selquery);
$data=$row->fetch_assoc();

if(isset($_POST["btnedit"]))
{
	$Name=$_POST["txtname"];
	$Email=$_POST["txtemail"];
	$Contact=$_POST["txtcontact"];
	$Address=$_POST["txtaddress"];
	$update="update tbl_user set user_name='$Name',user_email='$Email',user_contact='$Contact',user_address='$Address' where user_id='".$_SESSION['uid']."'";
	if ($con->query($update))
	{
		?>
        <script>
		alert("Updated")
		window.location="Myprofile.php";
		</script>
        <?php
		
	}
	else
	{
		
		?>
        <script>
		alert("Error")
		</script>
        <?php
		
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FitSeeker::Edit Profile</title>
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
    max-width: 600px;
    margin: 2rem auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 2rem;
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

  input[type="text"] {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }

  label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
  }

  td label {
    margin: 0;
  }
</style>
</head>
<body>

<div class="containers">
  <form id="form1" name="form1" method="post" action="">
    <table>
      <tr>
        <td align="center">Name</td>
        <td><label for="txtname">Name</label>
        <input type="text" name="txtname" id="txtname" value="<?php echo $data["user_name"] ?>" required/></td>
      </tr>
      <tr>
        <td align="center">Email</td>
        <td><label for="txtemail">Email</label>
        <input type="text" name="txtemail" id="txtemail" value="<?php echo $data["user_email"] ?>" /></td>
      </tr>
      <tr>
        <td align="center">Contact</td>
        <td><label for="txtcontact">Contact</label>
        <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data["user_contact"] ?>" /></td>
      </tr>
      <tr>
        <td align="center">Address</td>
        <td><label for="txtaddress">Address</label>
        <input type="text" name="txtaddress" id="txtaddress" value="<?php echo $data["user_address"] ?>" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="btnedit" id="txtedit" value="Update" />
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