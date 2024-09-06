	 <?php
	 include('../Connection/Connection.php');
	 ?>
	                         <select name="sel_place">
                        <option value="---select---">---select---</option>
					<?php
						$selqurey="select*from tbl_place where district_id=".$_GET["did"];
						$result=$con->query($selqurey);
						while($data=$result->fetch_assoc())
							{ 
						?>
 				 <option value="<?php echo $data["place_id"]?>">
 				 <?php echo $data["place_name"]?>
 				 </option>
 				 <?php
					}
				?>
</select>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
