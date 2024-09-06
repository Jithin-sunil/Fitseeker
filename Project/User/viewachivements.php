<?php

include('../Assets/Connection/Connection.php');
session_start();
include('Header.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::View Achievement</title>
</head>

<body>
<table width="666" height="161" border="1">
<tr>
		
        <td width="33">Achievement_name</td>
        <td width="33">Achievement_details</td>
        <td width="44">Achievements</td>
        </tr>
        <tr>
         <?php
		$selqurey="select * from tbl_achievement where traineer_id='".$_GET["aid"]."'";
		 $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
		{ $i++;
            ?>
            <tr>
       
            
            <td><?php echo $data["achievement_name"]?></td>
            <td><?php echo $data["achievement_details"]?></td>
             <td><img src="../Assets/Files/Traineerdocs/Achievement/<?php echo $data["achievement_photo"] ?>" width="50" height="50" />
             </tr>
            <?php
            } 
            ?> 
            </table>
        
</body>
<?php
include('Footer.php');
?>
</html>