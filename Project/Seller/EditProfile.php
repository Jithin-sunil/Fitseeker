<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
$Selquery="select * from tbl_seller where seller_id='".$_SESSION["sid"]."'";
$row=$con->query($Selquery);
$data=$row->fetch_assoc();

if(isset($_POST["btnedit"]))
{
	$Name=$_POST["txtname"];
	$Email=$_POST["txtemail"];
	$Contact=$_POST["txtcontact"];
	$Address=$_POST["txtaddress"];
	$update="update tbl_seller set seller_name='$Name',seller_email='$Email',seller_contact='$Contact',seller_address='$Address' where seller_id='".$_SESSION['sid']."'";
	if ($con->query($update))
	{
		?>
        <script>
		alert("Updated")
		window.location="Editprofile.php";
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
    <title>FitSeeker::Edit Profile</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .containers {
            max-width: 500px;
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
        td input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        td input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        td input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="containers">
        <h1>Edit Profile</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="txtname" id="txtname" value="<?php echo $data['seller_name']; ?>" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txtemail" id="txtemail" value="<?php echo $data['seller_email']; ?>" /></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['seller_contact']; ?>" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="txtaddress" id="txtaddress" value="<?php echo $data['seller_address']; ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" class="center"><input type="submit" name="btnedit" id="btnedit" value="Update" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>



<?php
include('Footer.php');
?>