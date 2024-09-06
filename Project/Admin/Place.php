<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$Place=$_POST["txtplace"];
	$Pincode=$_POST["txtpincode"];
	$districtID=$_POST["seldistrict"];	

  $s="select * from tbl_place where place_pincode='".$Pincode."'";
  $r=$con->query($s);
  if($d=$r->fetch_assoc())
  {
    ?>
  <script>
  alert('Already Exist');
</script>
<?php
  }


else
{
	$insqry="insert into tbl_place(place_name,place_pincode,district_id)values('$Place','$Pincode','$districtID')";

	if($con->query($insqry))
	{
    
    ?>
    <script>
      alert("Inserted!!");
      window.location = "Place.php";
    </script>
    <?php
		// echo "inserted";
	}
}


	if(isset($_GET["delID"]))
	{
		$Placeid=$_GET["delID"];
		
		$delqry="delete from tbl_place where place_id=$Placeid";
	if($con -> query($delqry))
	{
    ?>
    <script>
      alert("Deleted!!");
      window.location = "Place.php";
    </script>
    <?php
	// 	echo "Deleted";
	// 	header("location:Place.php");
	// }
	}
}
}
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Place</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <table width="212" border="1">
  <tr>
  <td>District</td>
  <td>
  <select name="seldistrict" required>
  <option value="---select---">---select---</option>
          <?php
			$selqurey="select*from tbl_district";
			$result=$con->query($selqurey);
			while($data=$result->fetch_assoc())
			{ 
			?>
  <option value="<?php echo $data["district_id"]?>">
  <?php echo $data["district_name"]?>
  </option>
  <?php
			}
			?>
           </select></td></tr>
  
  
  
  
  
    <tr>
      <td width="92">Placename</td>
      <td width="104"><label for="txtplace"></label>
      <input type="text" name="txtplace" id="txtplace" /></td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txtpincode"></label>
      <input type="text" name="txtpincode" id="txtpincode" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
   
  <table width="358" border="1">
<tr>
		<td>Slno</td>
		<td>Placename</td>
		<td>Pincode</td>
        <td>District</td>
		<td>Action</td>

</tr>

<?php
$selqurey="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
$result=$con->query($selqurey);
$i=0;
while($data=$result->fetch_assoc())
	{
	$i++;    
	?>
            <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["place_name"]?></td>
            <td><?php echo $data["place_pincode"]?></td>
            <td><?php echo $data["district_name"]?></td>
            <td><a href="PLace.php?delID=<?php echo $data["place_id"]?>">DELETE</a></td>
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