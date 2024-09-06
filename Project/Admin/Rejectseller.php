<?php

include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_GET["acpID"]))
	{
		$sellerid=$_GET["acpID"];
		$acpqry="update tbl_seller set seller_status='1' where seller_id=$sellerid";
	if($con-> query($acpqry))
	{
        
		?>
        <script>
            alert("Accepted");
            window.location="Rejectseller.php";
        </script>
        <?php
		// echo "Accepted";
		// header("location:Rejectseller.php");
	}
}
	
	
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Rejectseller</title>
</head>

<body>

 <table width="612" height="161" border="1">
 <tr>
 <td width="36">SlNO</td>
		<td width="38">Name</td>
        <td>Company Name</td>
		<td width="33">Email</td>
        <td width="49">Contact</td>
        <td width="34">Date of Join</td>
        <td width="51">Address</td>
        <td width="33">Place</td>
        <td width="44">District</td>
		<td width="55">Image</td>
        <td width="55">Proof</td>

        <td>Category</td>
		<td width="114">Action</td>
</tr>
<tr>
		<?php
		$selqurey="select * from tbl_seller u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id=d.district_id inner join tbl_category s on u.category_id=s.category_id where seller_status='2'";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
		{
            $i++;
            ?>
            <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["seller_name"]?></td>
            <td><?php echo $data["seller_companyname"]?></td>
            <td><?php echo $data["seller_email"]?></td>
            <td><?php echo $data["seller_contact"]?></td>
            <td><?php echo $data["seller_doj"]?></td>
            <td><?php echo $data["seller_address"]?></td>
            <td><?php echo $data["place_name"]?></td>
             <td><?php echo $data["district_name"]?></td>
             
             <td><img src="../Assets/Files/Sellerdocs/<?php echo $data["seller_image"] ?>" width="50" height="50" /> 
             </td>
              <td><img src="../Assets/Files/Sellerdocs/<?php echo $data["seller_proof"] ?>" width="50" height="50" /> 
              </td>
              <td><?php echo $data["category_name"]?></td>
                       <td><a href="Rejectseller.php?acpID=<?php echo $data["seller_id"]?>">ACCPET</a></td>
       
           
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