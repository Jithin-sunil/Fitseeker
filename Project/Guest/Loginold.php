<?php
include('../Assets/Connection/Connection.php');
session_start();
include('Header.php');


if(isset($_POST["btnlogin"]))
{
	$Email=$_POST["txtemail"];
	$Password=$_POST["txtpassword"];
	
	$Seluser="select * from tbl_user where user_email='$Email' and user_password='$Password'";
	$user=$con->query($Seluser);
	
	$Seladmin="select * from tbl_admin where admin_email='$Email' and admin_password='$Password'";
	$admin=$con->query($Seladmin);
	
	$Selseller="select * from tbl_seller where seller_email='$Email' and seller_password='$Password'";
	$seller=$con->query($Selseller);
	
	$Seltraineer="select * from tbl_traineer where traineer_email='$Email' and traineer_password='$Password'";
	$traineer=$con->query($Seltraineer);
	

	
	if($datauser=$user->fetch_assoc())
	{
		$_SESSION["uid"]=$datauser["user_id"];
		$_SESSSION["uname"]=$datauser["user_name"];
		header('Location:../User/Homepage.php');
	}
	else if ($dataadmin=$admin->fetch_assoc())
	{
		$_SESSION["aid"]=$dataadmin["admin_id"];
		$_SESSSION["aname"]=$dataadmin["admin_name"];
		header('Location:../Admin/Home.php');
	}
	else if ($dataseller=$seller->fetch_assoc())
	{
		$_SESSION["sid"]=$dataseller["seller_id"];
		$_SESSSION["sname"]=$dataseller["seller_name"];
		if($dataseller['seller_status']=='1')
		{
		header('Location:../Seller/HomePAGE.php');
		}
		else if($dataseller['seller_status']=='2')
		{
		?>
        <script>
		alert("Rejected");
		</script>
        <?php
		}
		else
		{
			?>
        <script>
		alert("Pending");
		</script>
        <?php
		}
	}
	else if ($datatraineer=$traineer->fetch_assoc())
	{
		$_SESSION["tid"]=$datatraineer["traineer_id"];
		$_SESSSION["tname"]=$datatraineer["traineer_name"];
		
		
		
		
		
		
		if($datatraineer['traineer_status']=='1')
		{
		header('Location:../Traineer/HomePAGE.php');
		}
		else if($datatraineer['traineer_status']=='2')
		{
		?>
        <script>
		alert("Rejected");
		</script>
        <?php
		}
		else
		{
			?>
        <script>
		alert("Pending");
		</script>
        <?php
		}
	
		
		
	}
	
	else
		{
			?>
            <script>
			alert("INVAILD data")
			</script>
            <?php
		}
}
		
			
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page </title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="413" height="170" border="1">
    <tr>
      <td width="118" scope="col" align="center">Email</td>
      <td width="221" scope="col"><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td align="center">Password</td>
      <td><label for="tpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnlogin" id="btnlogin" value="Login" /></td>
    </tr>
  </table>
</form>
</body>
</html>



<?php
include('Footer.php');
?>