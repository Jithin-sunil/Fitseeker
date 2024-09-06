<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
		$subcategory=$_POST["txtsubcategory"];
	$CategoryID=$_POST["selcategory"];	

  $s="select * from tbl_subcategory where subcategory_name='".$subcategory."'";
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
	$insqry="insert into tbl_subcategory(subcategory_name,category_id)values('$subcategory','$CategoryID')";

	if($con->query($insqry))
	{
    ?>
        <script>
            alert("Inserted");
            window.location="Subcategory.php";
        </script>
        <?php
		// echo "inserted";
	}
}


	if(isset($_GET["delID"]))
	{
		$del=$_GET["delID"];
		
		$delqry="delete from tbl_subcategory where subcategory_id='$del'";
	if($con -> query($delqry))
	{
    ?>
        <script>
            alert("Deleted");
            window.location="Subcategory.php";
        </script>
        <?php
		// echo "Deleted";
		// header("location:Subcategory.php");
	}
	}
}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Subcategory </title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="387" border="1">
  <tr>
  <td>Category</td>
    <td align="center"> 
    <select name="selcategory">
  <option value="---select---">---select---</option>
          <?php
			$selqurey="select*from tbl_category";
			$result=$con->query($selqurey);
			while($data=$result->fetch_assoc())
			{ 
			?>
  <option value="<?php echo $data["category_id"]?>">
  <?php echo $data["category_name"]?>
  </option>
  <?php
			}
			?>
           </select></td></tr>

  
  
    <tr>
      <td width="154">Subcategory Name</td>
      <td width="217"><label for="txtsubcategory"></label>
      <input type="text" name="txtsubcategory" id="txtsubcategory" /></td>
    </tr>
    <tr>
      <td height="64" colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
    </tr>
  </table>
     
  <table width="358" border="1">
<tr>
		<td>Slno</td>
		<td>Subcategory</td>
		<td>Category</td>
  		<td>Action</td>

</tr>	

<?php
$selqurey="select * from tbl_subcategory s inner join tbl_category c on s.category_id = c.category_id";
$result=$con->query($selqurey);
$i=0;		
while($data=$result->fetch_assoc())
	{
	$i++;    
	?>
            <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["subcategory_name"]?></td>
            <td><?php echo $data["category_name"]?></td>
            <td><a href="Subcategory.php?delID=<?php echo $data["subcategory_id"]?>">DELETE</a></td>
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