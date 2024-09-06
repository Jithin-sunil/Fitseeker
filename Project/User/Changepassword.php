<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
if(isset($_POST["btnchangepassword"]))
{
	$Currentpassword=$_POST["txtoldpassword"];
	$Newpassword=$_POST["txtnewpassword"];
	$Reenterpassword=$_POST["txtreenterpassword"];
	$Selqury="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
	$row=$con->query($Selqury);
	$data=$row->fetch_assoc();
	$Oldpassword=$data["user_password"];
	if($Oldpassword==$Currentpassword)
	{
		if($Newpassword==$Reenterpassword)
		{
			$update="update tbl_user set user_password='$Newpassword' where user_id='".$_SESSION["uid"]."'";
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
<title>FitSeeker::Changepassword </title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="373" height="217" border="1">
    <tr>
      <td width="174" scope="col" align="center">Old Password</td>
      <td width="183" scope="col"><label for="txtoldpassword"></label>
      <input type="text" name="txtoldpassword" id="txtoldpassword" /></td>
    </tr>
    <tr>
      <td align="center">New Password</td>
      <td><label for="txtnewpassword"></label>
      <input type="text" name="txtnewpassword" id="txtnewpassword" /></td>
    </tr>
    <tr>
      <td align="center">Re-type Password</td>
      <td><label for="txtreenterpassword"></label>
      <input type="text" name="txtreenterpassword" id="txtreenterpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change password" />&nbsp;&nbsp;
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>


<?php
include('Footer.php');
?>