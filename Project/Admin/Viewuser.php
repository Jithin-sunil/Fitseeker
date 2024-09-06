<?php

include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_GET["delID"]))
	{
		$userid=$_GET["delID"];
		$delqry="delete from tbl_user where user_id=$userid";
	if($con-> query($delqry))
	{
        ?>
        <script>
            alert("Deleted");
            window.location="Viewuser.php";
        </script>
        <?php
		// echo "Deleted";
		// header("location:Viewuser.php");
	}
}
	
	
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Users List</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
 <table width="358" border="1">
 <tr>
		<td>User_id</td>
		<td>Username</td>
		<td>Email</td>
        <td>Contact</td>
        <td>District</td>
        <td>Place</td>
		<td>Photo</td>
        <td>Proof</td>
		<td>Action</td>

</tr>
<tr>
		<?php
		$selqurey="select * from tbl_user u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id=d.district_id";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
		{
            $i++;
            ?>
            <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["user_name"]?></td>
            <td><?php echo $data["user_email"]?></td>
            <td><?php echo $data["user_contact"]?></td>
             <td><?php echo $data["district_name"]?></td>
             <td><?php echo $data["place_name"]?></td>
             <td><img src="../Assets/Files/Userdocs/<?php echo $data["user_photo"] ?>" width="50" height="50" /> </td>
              <td><img src="../Assets/Files/Userdocs/<?php echo $data["user_proof"] ?>" width="50" height="50" /> </td>
                          
            <td><a href="Viewuser.php?delID=<?php echo $data["user_id"]?>">DELETE</a></td>
            </tr>
            <?php
            } 
            ?> 
            </table>


</form>
</body>
<?php
include('Footer.php')
?>
</html>