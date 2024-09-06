<?php

include('../Assets/Connection/Connection.php');


include('Header.php');
if(isset($_GET['rid']))
{
			$insQry="insert into tbl_request(course_id,user_id,request_date) values('".$_GET['rid']."','".$_SESSION['uid']."',curdate())";
			$con->query($insQry)
			
				?>
            	<script>
				alert("Requested")
                window.location = "Viewtraineer.php";
				</script>
           		 <?php
}
			
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Addcourse </title>
</head>

<body>
<table width="666" height="161" border="1">
<tr>
		
        <td width="33">Course_type</td>
        <td width="44">Course</td>
		<td width="55">Coursedetails</td>
       
        </tr>
 <tr>
 <?php
		 $selqurey="select * from tbl_course u inner join tbl_coursetype p on u.coursetype_id = p.coursetype_id  where traineer_id='".$_GET["cid"]."'";
		
		 $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
		{
            $i++;
            ?>
            <tr>
       
            
            <td><?php echo $data["coursetype_name"]?></td>
            <td><?php echo $data["course_name"]?></td>
            <td><?php echo $data["course_details"]?></td>
            
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