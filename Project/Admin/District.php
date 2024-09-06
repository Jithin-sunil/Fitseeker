<?php
 $did = '';
  $dname ='';	
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$id = $_POST["txt_id"];
	$District=$_POST["txtdistrict"];

  $s="select * from tbl_district where district_name='".$District."'";
  $r=$con->query($s);
  if($d=$r->fetch_assoc())
  {
    ?>
  <script>
  alert('Already Exist');
</script>
<?php
  }
   
	else if ($id =='')
  {
    $insqry="insert into tbl_district(district_name)values('$District')";
  
    $con->query($insqry)
    
      ?>
      <script>
        alert("Inserted!!");
        window.location = "District.php";
      </script>
      <?php
        
  }

  

 else  {
      $upQry = "update tbl_district set district_name='" . $District . "' where district_id='" . $id . "'";
      if ($con->query($upQry))
       {
        ?>
<script>
  alert("Updated Successfully!!");
  window.location = "District.php";
</script>
<?php
      }
 }
}

	if(isset($_GET["delID"]))
	{
		$districtid=$_GET["delID"];
		$delqry="delete from tbl_district where district_id=$districtid";
	if($con -> query($delqry))
  {
    ?>
<script>
  alert("Deleted Successfully!!");
  window.location = "District.php";
</script>
<?php
  }
	}
 
	

if (isset($_GET["editID"])) 
{
  $selst = "select * from tbl_district where district_id='" . $_GET["editID"] . "'";
  $rowst = $con->query($selst);
  $datast = $rowst->fetch_assoc();
  $did = $datast["district_id"];
  $dname = $datast["district_name"];	
}
?>




<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>FitSeeker::District</title>
</head>

<body>

  <form id="form1" name="form1" method="post" action="">
    <table width="294" height="105" border="1">
      <tr>
        <th width="138" height="51" scope="col">District</th>
        <th width="144" scope="col"><label for="txtdistrict"></label>
          <input type="text" name="txtdistrict" id="txtdistrict" value="<?php echo $dname ?> " />
          <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $did ?>" />
        </th>

      </tr>
      <tr>
        <th height="46" colspan="2" scope="col"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
        </th>
      </tr>
    </table>
    <table width="294" height="105" border="1">
      <tr>
        <td>Slno</td>
        <td>Districtname</td>
        <td>Action</td>
      </tr>
      <?php
$selqurey="select * from tbl_district";
$result=$con->query($selqurey);
$i=0;
while($data=$result->fetch_assoc()){
	$i++;    
	?>
      <tr>
        <td>
          <?php echo $i?>
        </td>
        <td>
          <?php echo $data["district_name"]?>
        </td>
        <td><a href="District.php?delID=<?php echo $data["district_id"]?>">DELETE</a></td>
        <td><a href="District.php?editID=<?php echo $data["district_id"]?>">EDIT</a></td>
      </tr>
      <?php
    } 
	?>
    </table>



  </form>
</body>

</html>


<?php
include('Footer.php')
?>