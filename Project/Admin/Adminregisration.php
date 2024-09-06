<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
// if(isset($_POST["btnregister"]))
// {		
// 	$Name=$_POST["txtname"];
// 	$Email=$_POST["txtemail"];
// 	$Password=$_POST["txtpassword"];
// 	$insqry="insert into tbl_admin(admin_name,admin_email,admin_password) values('$Name','$Email','$Password')";

// 	if($con->query($insqry))
// 	{
// 		echo "inserted";
// 	}
// }
		

// 	if(isset($_GET["delID"]))
// 	{
// 		$adminid=$_GET["delID"];
// 		$delqry="delete from tbl_admin where admin_id=$adminid";
// 	if($con -> query($delqry))
// 	{
// 		echo "Deleted";
// 		header("location:Adminregisration.php");
// 	}
// 	}
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Admin Regisration</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <table width="358" border="1">
    <tr>
      <td width="164">Name</td>
      <td width="178"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" required title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail"  required name="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass"  /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnregister" id="btnregister" value="Register" /></td>
    </tr>
  </table><br/>
  
  <!-- <table width="358" border="1">
<tr>
		<td>Slno</td>
		<td>Name</td>
		<td>Email</td>
		<td>Password</td>
		<td>Action</td>

</tr>
		<?php
        $selqurey="select*from tbl_admin";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc()){
            $i++;
            ?>
            <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["admin_name"]?></td>
            <td><?php echo $data["admin_email"]?></td>
            <td><?php echo $data["admin_password"]?></td>
            <td><a href="Adminregisration.php?delID=<?php echo $data["admin_id"]?>">DELETE</a></td>
            </tr>
            <?php
            } 
            ?> 
            </table> -->
            
</form>
</body>
</html>
<form>

<?php
include('Footer.php');
?>
