<?php

include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_GET["rejID"]))
	{
		$traineerid=$_GET["rejID"];
		$rejqry="update tbl_traineer set traineer_status='2' where traineer_id=$traineerid";
	if($con-> query($rejqry))
	{
		?>
        <script>
            alert("Rejected");
            window.location="Acceptedtrainers.php";
        </script>
        <?php
	}
}
	
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::View AcceptedTrainners</title>
</head>

<body>

 <table width="612" height="161" border="1">
 <tr>
		<td width="36">SlNO</td>
		<td width="38">Name</td>
		<td width="33">Email</td>
        <td width="49">Contact</td>
        <td width="34">Date of Birth</td>
        <td width="51">Address</td>
        <td width="33">Place</td>
        <td width="44">District</td>
		<td width="55">Image</td>
        <td width="55">Proof</td>

        <td width="55">Course</td>
        <td width="55">Course_type</td>
        <td width="55">Qualification</td>
        <td width="55">Experiance</td>


		<td width="114">Action</td>

</tr>
<tr>
		<?php
		$selqurey="select * from tbl_traineer u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id=d.district_id inner join tbl_coursetype z on u.course_id=z.coursetype_id where traineer_status='1'";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
		{
            $i++;
            ?>
            <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["traineer_name"]?></td>
            <td><?php echo $data["traineer_email"]?></td>
            <td><?php echo $data["traineer_contact"]?></td>
            <td><?php echo $data["traineer_dob"]?></td>
            <td><?php echo $data["traineer_address"]?></td>
            <td><?php echo $data["place_name"]?></td>
             <td><?php echo $data["district_name"]?></td>
             
             <td><img src="../Assets/Files/Traineerdocs/<?php echo $data["traineer_photo"] ?>" width="50" height="50" /> </td>
              <td><img src="../Assets/Files/Traineerdocs/<?php echo $data["traineer_proof"] ?>" width="50" height="50" />
               </td>



               <td><?php echo $data["traineer_course"]?></td>
              <td><?php echo $data["coursetype_name"]?></td>
              <td><img src="../Assets/Files/Traineerdocs/Qualification/<?php echo $data["traineer_qualification"] ?>" width="50" height="50" /> </td>
              <td><?php echo $data["traineer_experience"]?></td>




                   <td><a href="Acceptedtrainers.php?rejID=<?php echo $data["traineer_id"]?>">REJECT</a></td>
                   <td><a href="addoncourses.php?cid=<?php echo $data["traineer_id"]?>">ALL Courses Provide</a></td>
  
           
            </tr>
            <?php
            } 
            ?> 
            </table>




</body>
<?php
include('Footer.php')
?>
</html>