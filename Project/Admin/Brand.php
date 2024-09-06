<?php
	$did = '';
  $bname ='';
include('../Assets/Connection/Connection.php');
include('Header.php');
	if(isset($_POST["btnadd"]))
		{
			$id = $_POST["txt_id"];
			$Brand=$_POST["txtbrand"];
			if ($id =='') {

			$insqry="insert into tbl_brand(brand_name)values('$Brand')";

	if($con->query($insqry))
		{
			
				?>
				<script>
				  alert("Inserted!!");
				  window.location = "Brand.php";
				</script>
				<?php
			  
			// echo "inserted";
		}
}
	else
 	 {
  	    $upQry = "update tbl_brand set brand_name='" . $Brand . "' where brand_id='" . $id . "'";
   		   if ($con->query($upQry))
		    {
       			 ?>
      			  <script>
         			 alert("Updated Successfully!!");
         			 window.location = "Brand.php";
        			</script>
     			   <?php
     		 }}
 }


	if(isset($_GET["delID"]))
	{
		$brandid=$_GET["delID"];
		$delqry="delete from tbl_brand where brand_id=$brandid";
	if($con -> query($delqry))
	{
		?>
		<script>
		  alert("Deleted Successfully!!");
		  window.location = "Brand.php";
		</script>
		<?php
		// echo "Deleted";
		// header("location:Brand.php");
	}
	}
 
	

if (isset($_GET["editID"])) 
{
  $selst = "select * from tbl_brand where brand_id='" . $_GET["editID"] . "'";
  $rowst = $con->query($selst);
  $datast = $rowst->fetch_assoc();
  $did = $datast["brand_id"];
  $bname = $datast["brand_name"];	
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Brand</title>
</head>

<body>


<form id="form1" name="form1" method="post" action="">
  <table width="317" height="161" border="1">
    <tr>
      <th width="121" height="83" scope="col">Brand Name</th>
      <th width="180" scope="col"><label for="txtbrand"></label>
      <input type="text" name="txtbrand" id="txtbrand" value="<?php echo $bname ?> " />
            <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $did ?>" /></th>

    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Add" /></td>
    </tr>
  </table>
  <table width="294" height="105" border="1">
  <tr>
		<td>Slno</td>
		<td>Brand name</td>
		<td>Action</td>
        </tr>
        <?php
$selqurey="select * from tbl_brand";
$result=$con->query($selqurey);
$i=0;
while($data=$result->fetch_assoc())
	{
	$i++;    
	?>
	<tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["brand_name"]?></td>
    <td><a href="Brand.php?delID=<?php echo $data["brand_id"]?>">DELETE</a></td>
    <td><a href="Brand.php?editID=<?php echo $data["brand_id"]?>">EDIT</a></td>
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