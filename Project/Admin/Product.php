
<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$Category=$_POST["selcategory"];
	$Subcategory=$_POST["sel_subcategory"];

	$Name=$_POST["txtname"];
	$Price=$_POST["txtprice"];
	$Details=$_POST["txtdetails"];
	
	
	$image=$_FILES["image"]["name"];
	$temp=$_FILES["image"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Product/'.$image);
	
	$insqry="insert into tbl_product(product_name,product_price,product_details,product_image,subcategory_id)values('$Name','$Price','$Details','$image','$Subcategory')";
		if($con->query($insqry))
	{
    ?>
    <script>
      alert("Inserted!!");
      window.location = "Product.php";
    </script>
    <?php
		// echo "inserted";
	}
	else
	{ echo "Error";
	}
}
if(isset($_GET["delID"]))
	{
		$productid=$_GET["delID"];
		$delqry="delete from tbl_product where product_id=$productid";
	if($con-> query($delqry))
	{
		echo "Deleted";
		header("location:Product.php");
	}
}
	
		

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Product</title>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="578" height="342" border="1">
    <tr>
        <td>Category</td>
  			<td>
 				 <select name="selcategory" onchange="getSubcategory(this.value)">
  				<option>---select---</option>
         			 <?php
						$selqurey="select * from tbl_category";
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
           </select></td>
          
    </tr>
      <tr>
      <td>Subcategory</td>
      <td>
                         <select name="sel_subcategory" id="sel_subcategory">
                        <option>---select---</option>
         			 
           </select>
           </td>
           </tr>
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice"></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdetails"></label>
      <input type="text" name="txtdetails" id="txtdetails"></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label for="image"></label>
      <input type="file" name="image" id="image"></td>
    </tr>
    <tr>
      <td height="70" colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
      <input type="reset" name="btncancel" id="btncancel" value="Cancel"></td>
    </tr>
  </table>
  <table width="578" height="342" border="1">
  <tr>
		<td>Slno</td>
		<td>Subcategory</td>
		<td>Category</td>
        <td>Name</td>
        <td>Price</td>
        <td>Details</td>
        <td>Image</td>
  		<td>Action</td>

</tr>	

<?php
$selqurey="select * from tbl_product s inner join tbl_subcategory c on s.subcategory_id = c.subcategory_id inner join tbl_category d on c.category_id=d.category_id";
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
            <td><?php echo $data["product_name"]?></td>
            <td><?php echo $data["product_price"]?></td>
            <td><?php echo $data["product_details"]?></td>
             <td><img src="../Assets/Files/Product/<?php echo $data["product_image"] ?>" width="50" height="50" /> </td>
             <td><a href="Product.php?delID=<?php echo $data["product_id"]?>">DELETE</a></td>
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


<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getSubcategory(did) {
    $.ajax({
      url: "../Assets/AjaxPages/Ajaxsubcategory.php?did=" + did,
      success: function (result) {

        $("#sel_subcategory").html(result);
      }
    });
  }

</script>