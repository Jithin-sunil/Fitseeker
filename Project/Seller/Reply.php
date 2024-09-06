<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
 if(isset($_POST["btnsubmit"]))
{
	
	$Reply= $_POST["txtreply"];
	if(isset($_GET["rid"]))
	{
		$complaintid=$_GET["rid"];
	$rejqry="update tbl_complaint set complaint_status='1',complaint_reply='$Reply',complaint_replydate=curdate() where complaint_id=$complaintid";
	$con-> query($rejqry)
	
	
	
					?>
            	<script>
				alert("Replyed")
				</script>
           		 <?php
			
	}
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Reply</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Reply</td>
      <td><label for="txtreply"></label>
      <input type="text" name="txtreply" id="txtreply" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Sent" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Footer.php');
?>
</html>