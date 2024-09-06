<?php

$did='';
$dos='';


include('../Assets/Connection/Connection.php');

include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$cat = $_POST["txtcat"];
	$Category=$_POST["txtcategory"];


  $s="select * from tbl_category where category_name='".$Category."'";
  $r=$con->query($s);
  if($d=$r->fetch_assoc())
  {
    ?>
  <script>
  alert('Already Exist');
</script>
<?php
  }


	else if($cat=='')
	{
	$insqry="insert into tbl_category(category_name)values('$Category')";

	if($con->query($insqry))
	{
		?>
        <script>
          alert("Inserted Successfully!!");
          window.location = "Category.php";
        </script>
        <?php
		// echo "inserted";
	}
	
}
else
	{
	 $upQry = "update tbl_category set  category_name='" . $Category . "' where category_id='" . $cat . "'";
	       if ($con->query($upQry)) {
        ?>
        <script>
          alert("Updated Successfully!!");
          window.location = "Category.php";
        </script>
        <?php
      }

	}
}


	if(isset($_GET["delID"]))
	{
		$Categoryid=$_GET["delID"];
		$delqry="delete from tbl_category where category_id=$Categoryid";
	if($con -> query($delqry))
	{
		?>
        <script>
          alert("Deleted Successfully!!");
          window.location = "Category.php";
        </script>
        <?php
		// echo "Deleted";
		// header("location:Category.php");
	}
	}
	
	
	if(isset($_GET["EditID"]))
	{
		$selqry="select * from tbl_category where category_id='".$_GET['EditID']."'";
		$row=$con->query($selqry);
		$dat=$row->fetch_assoc();
		$did=$dat["category_id"];
		$dos=$dat["category_name"];
	}
	
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Category </title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <table width="338" border="1">
    <tr>
      <td width="172">Category Name</td>
      <td width="150"><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory" value="<?php echo $dos ?>"/>
      <input type="hidden" name="txtcat" id="txtcat" value="<?php echo $did ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
   <table width="294" height="105" border="1">
  <tr>
		<td>Slno</td>
		<td>Categoryname</td>
		<td>Action</td>
        </tr>
        <?php
$selqurey="select*from tbl_category";
$result=$con->query($selqurey);
$i=0;
while($data=$result->fetch_assoc()){
	$i++;    
	?>
	<tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["category_name"]?></td>
    <td><a href="Category.php?delID=<?php echo $data["category_id"]?>">DELETE</a></td>
    <td><a href="Category.php?EditID=<?php echo $data["category_id"]?>">Edit</a></td>
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