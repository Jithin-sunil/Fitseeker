<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
if(isset($_POST["btnchangepassword"]))
{
	$Currentpassword=$_POST["txtoldpassword"];
	$Newpassword=$_POST["txtnewpassword"];
	$Reenterpassword=$_POST["txtreenterpassword"];
	$Selqury="select * from tbl_seller where seller_id='".$_SESSION["sid"]."'";
	$row=$con->query($Selqury);
	$data=$row->fetch_assoc();
	$Oldpassword=$data["seller_password"];
	if($Oldpassword==$Currentpassword)
	{
		if($Newpassword==$Reenterpassword)
		{
			$update="update tbl_seller set seller_password='$Newpassword' where seller_id='".$_SESSION["sid"]."'";
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
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .containers {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border: none;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        td input[type="text"], td input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        td input[type="submit"], td input[type="reset"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        td input[type="reset"] {
            background-color: #dc3545;
        }
        td input[type="submit"]:hover {
            background-color: #0056b3;
        }
        td input[type="reset"]:hover {
            background-color: #c82333;
        }
        .action-buttons {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="containers">
        <h1>Change Password</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td>Old Password</td>
                    <td><input type="password" name="txtoldpassword" id="txtoldpassword" placeholder="Enter old password" /></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="txtnewpassword" id="txtnewpassword" placeholder="Enter new password" /></td>
                </tr>
                <tr>
                    <td>Re-type Password</td>
                    <td><input type="password" name="txtreenterpassword" id="txtreenterpassword" placeholder="Re-enter new password" /></td>
                </tr>
                <tr>
                    <td colspan="2" class="action-buttons">
                        <input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change Password" />
                        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
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