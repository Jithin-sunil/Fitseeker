<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
$Selquery="select * from tbl_traineer where traineer_id='".$_SESSION["tid"]."'";
$row=$con->query($Selquery);
$data=$row->fetch_assoc();

if(isset($_POST["btnedit"]))
{
	$Name=$_POST["txtname"];
	$Email=$_POST["txtemail"];
	$Contact=$_POST["txtcontact"];
	$Address=$_POST["txtaddress"];
	$update="update tbl_traineer set traineer_name='$Name',traineer_email='$Email',traineer_contact='$Contact',traineer_address='$Address' where traineer_id='".$_SESSION['tid']."'";
	if ($con->query($update))
	{
		?>
        <script>
		alert("Updated")
		window.location="EditPROFILE.php";
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



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::EditProfile </title>
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

a {
    color: #1976d2;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 15px;
    border: 1px solid #1976d2;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
    font-size: 16px;
}

a:hover {
    background-color: #1976d2;
    color: #ffffff;
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
    margin-bottom: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #1976d2;
    color: #ffffff;
    font-weight: bold;
}

input[type="text"] {
    width: calc(100% - 30px);
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #1976d2;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #1565c0;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <th align="center">Name</th>
      <td><input type="text" name="txtname" id="txtname"  value="<?php echo $data["traineer_name"]?>"/></td>
    </tr>
    <tr>
      <th align="center">Email</th>
      <td><input type="text" name="txtemail" id="txtemail"  value="<?php echo $data["traineer_email"]?>"/></td>
    </tr>
    <tr>
      <th align="center">Contact</th>
      <td><input type="text" name="txtcontact" id="txtcontact"  value="<?php echo $data["traineer_contact"]?>" /></td>
    </tr>
    <tr>
      <th align="center">Address</th>
      <td><input type="text" name="txtaddress" id="txtaddress"  value="<?php echo $data["traineer_address"]?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnedit" id="txtedit" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
</html>


<?php
include('Footer.php');
?>