<?php
include('../Assets/Connection/Connection.php');
include('Header.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::View Reply </title>
</head>

<body>
<table width="666" height="161" border="1">
<tr>
		
        <td width="44">Reply_Date</td>
      
		<td width="55">Product_name</td>
        <td width="55">Reply </td>
        </tr>
 <tr>
 <?php
	
	
		$selqurey="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_product p on c.product_id=p.product_id";
		$result=$con->query($selqurey);
		$i=0;
        while($data=$result->fetch_assoc())
		{
            $i++;
		
		?>
		
		
        
        
        </tr>
        <tr>
            <td><?php echo $data["complaint_replydate"]?></td>
            
            <td><?php echo $data["product_name"]?></td>
            <td><?php echo $data["complaint_reply"]?></td>
       <?php
		}
		   ?>
            </tr>
            </table>
</body>
<?php
include('Footer.php');
?>
</html>