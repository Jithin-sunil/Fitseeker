	<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
if(isset($_POST["btnchangepassword"]))
{
	$Currentpassword=$_POST["txtoldpassword"];
	$Newpassword=$_POST["txtnewpassword"];
	$Reenterpassword=$_POST["txtreenterpassword"];
	$Selqury="select * from tbl_traineer where traineer_id='".$_SESSION["tid"]."'";
	$row=$con->query($Selqury);
	$data=$row->fetch_assoc();
	$Oldpassword=$data["traineer_password"];
	if($Oldpassword==$Currentpassword)
	{
		if($Newpassword==$Reenterpassword)
		{
			$update="update tbl_traineer set traineer_password='$Newpassword' where traineer_id='".$_SESSION["tid"]."'";
			$con->query($update)
			
				?>
            	<script>
				alert("Updated")
				</script>
           		 <?php
			}
		
		
			else
			{
				?>
            	<script>
				alert("Mismatch password")
				</script>
           		 <?php
			}
	   }
		else
		{
			?>
            <script>
			alert("Incorrect password")
			</script>
            <?php
		}	
	
}



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Change Password</title>
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
    display: block;
    margin-bottom: 20px;
    text-align: center;
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
    max-width: 500px;
    width: 100%;
}

h1 {
    color: #1976d2;
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #1976d2;
    color: #ffffff;
    font-weight: bold;
    text-align: center;
}

input[type="password"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

button {
    background-color: #1976d2;
    color: #ffffff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 120px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #1565c0;
}

button:active {
    background-color: #0d47a1;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <h1>Change Password</h1>
    <table>
        <tr>
            <th>Old Password</th>
            <td><input type="password" name="txtoldpassword" id="txtoldpassword" /></td>
        </tr>
        <tr>
            <th>New Password</th>
            <td><input type="password" name="txtnewpassword" id="txtnewpassword" /></td>
        </tr>
        <tr>
            <th>Re-type Password</th>
            <td><input type="password" name="txtreenterpassword" id="txtreenterpassword" /></td>
        </tr>
    </table>
    <div class="button-container">
        <button type="submit" name="btnchangepassword" id="btnchangepassword">Change</button>
        <button type="reset" name="btncancel" id="btncancel">Cancel</button>
    </div>
</form>

</body>
</html>




<?php
include('Footer.php');
?>