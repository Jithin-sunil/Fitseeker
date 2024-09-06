
<?php
// session_start();
include('Header.php');
include('../Assets/Connection/Connection.php');
if(isset($_POST["btnsubmit"]))
{
	$Category=$_POST["selcategory"];
	$Subcategory=$_POST["sel_subcategory"];

	$Name=$_POST["txtname"];
	$Price=$_POST["txtprice"];
	$Details=$_POST["txtdetails"];
	
	$Brand=$_POST["selbrand"];
	
	$image=$_FILES["image"]["name"];
	$temp=$_FILES["image"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Product/'.$image);
	
	$insqry="insert into tbl_product(product_name,product_price,product_details,product_image,subcategory_id,brand_id,seller_id)values('$Name','$Price','$Details','$image','$Subcategory','$Brand','".$_SESSION["sid"]."')";
		if($con->query($insqry))
	{
    ?>
        <script>
            alert("inserted");
            window.location="Product.php";
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
    ?>
        <script>
            alert("Deleted");
            window.location="Product.php";
        </script>
        <?php
		// echo "Deleted";
		// header("location:Product.php");
	}
}
	
		

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Product</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fa;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    .containers {
        max-width: 900px;
        margin: 0 auto;
        background-color: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    table, th, td {
        border: 1px solid #e0e0e0;
    }

    th, td {
        padding: 15px;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background-color: #2980b9;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    tr:hover {
        background-color: #ecf0f1;
    }

    input[type="text"], select, input[type="file"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
        color: #495057;
    }
    .button-container {
        text-align: center;
    }

    input[type="submit"], input[type="reset"] {
        background-color: #2980b9;
        color: #fff;
        border: none;
        padding: 12px 25px;
        text-transform: uppercase;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        margin-right: 10px;
        transition: background-color 0.3s ease;
        
        
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #1a6399;
    }

    td img {
        border-radius: 4px;
        max-width: 50px;
        height: auto;
    }

    .action-link {
        color: #e74c3c;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .action-link:hover {
        color: #c0392b;
    }
</style>
</head>

<body>

<div class="containers">
    <h2>Add New Product</h2>
    <form action="" method="post" enctype="multipart/form-data" name="form1">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txtname" id="txtname" /></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="txtprice" id="txtprice" /></td>
            </tr>
            <tr>
                <td>Details</td>
                <td><input type="text" name="txtdetails" id="txtdetails" /></td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="selcategory" onchange="getSubcategory(this.value)">
                        <option>---select---</option>
                        <?php
                            $selqurey="select * from tbl_category";
                            $result=$con->query($selqurey);
                            while($data=$result->fetch_assoc()) { 
                        ?>
                        <option value="<?php echo $data['category_id']?>"> 
                            <?php echo $data['category_name']?> 
                        </option>
                        <?php } ?>
                    </select>
                </td>
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
                <td>Brand</td>
                <td>
                    <select name="selbrand" id="selbrand">
                        <option>---select---</option>
                        <?php
                            $selqurey="select * from tbl_brand";
                            $result=$con->query($selqurey);
                            while($data=$result->fetch_assoc()) { 
                        ?>
                        <option value="<?php echo $data['brand_id']?>"> 
                            <?php echo $data['brand_name']?> 
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id="image" /></td>
            </tr>
            <tr>
                <td colspan="2" class="button-container">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>

    <h2>Product List</h2>
    <table>
        <tr>
            <th>Slno</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
            <th>Subcategory</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php
            $selqurey="select * from tbl_product s 
            inner join tbl_subcategory c on s.subcategory_id = c.subcategory_id 
            inner join tbl_category d on c.category_id=d.category_id 
            inner join tbl_brand b on s.brand_id=b.brand_id 
            where seller_id='".$_SESSION["sid"]."'";
            $result=$con->query($selqurey);
            $i=0;        
            while($data=$result->fetch_assoc()) {
                $i++;    
        ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["product_name"]?></td>
            <td><?php echo $data["product_price"]?></td>
            <td><?php echo $data["product_details"]?></td>
            <td><?php echo $data["subcategory_name"]?></td>
            <td><?php echo $data["category_name"]?></td>
            <td><?php echo $data["brand_name"]?></td>
            <td><img src="../Assets/Files/Product/<?php echo $data["product_image"] ?>" /></td>
            <td><a class="action-link" href="Product.php?delID=<?php echo $data['product_id']?>">DELETE</a></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>



<?php
include('Footer.php');
?>


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