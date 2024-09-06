<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$Course_type=$_POST["txtcourse"];

  $s="select * from tbl_coursetype where coursetype_name='".$Course_type."'";
  $r=$con->query($s);
  if($d=$r->fetch_assoc())
  {
    ?>
  <script>
  alert('Already Exist');
</script>
<?php
  }
else{


	$insqry="insert into tbl_coursetype(coursetype_name)values('$Course_type')";
	if($con->query($insqry))
	{
    ?>
        <script>
          alert("Inserted Successfully!!");
          window.location = "Coursetype.php";
        </script>
        <?php
		// echo "inserted";
	}
}
}


if(isset($_GET["delID"]))
{
  $coursetypeid=$_GET["delID"];
  $delqry="delete from tbl_coursetype where coursetype_id=$coursetypeid";
if($con -> query($delqry))
{
  ?>
  <script>
    alert("Deleted Successfully!!");
    window.location = "Coursetype.php";
  </script>
  <?php
}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Coursetype </title>
</head>

<body>


<form id="form1" name="form1" method="post" action="">
  <table align="center" width="200" border="1">
    <tr>
      <td>Course Type</td>
      <td><label for="txtcourse"></label>
      <input type="text" name="txtcourse" id="txtcourse" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>


<table width="358" border="1">
 <tr>
		<td>NO.</td>
		<td>coursetype_name</td>
		<td>Action</td>

</tr>
<tr>
		<?php
		$selqurey="select * from tbl_coursetype";
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
		{
            $i++;
            ?>
            <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["coursetype_name"]?></td>
            <td><a href="Coursetype.php?delID=<?php echo $data["coursetype_id"]?>">Delete</a> 
            <?php
    }
    ?>
</body>
<?php
include('Footer.php')
?>
</html>