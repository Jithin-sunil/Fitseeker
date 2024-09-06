<?php

include('../Assets/Connection/Connection.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::ViewProduct</title>
</head>

<body>
  <table width="578" height="342" border="1">
  <tr>
		<td>Slno</td>
        <td>Name</td>
        <td>Price</td>
        <td>Details</td>
        <td>Subcategory</td>
		<td>Category</td>
        <td>Image</td>
  		

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
            <td><?php echo $data["product_name"]?></td>
            <td><?php echo $data["product_price"]?></td>
            <td><?php echo $data["product_details"]?></td>
            <td><?php echo $data["subcategory_name"]?></td>
            <td><?php echo $data["category_name"]?></td>
             <td><img src="../Assets/Files/Product/<?php echo $data["product_image"] ?>" width="50" height="50" /> </td>
            </tr>
            <?php
            } 
            ?> 
            </table>
</body>
</html>