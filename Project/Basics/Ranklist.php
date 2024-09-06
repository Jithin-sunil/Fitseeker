<?php
$Name=" ";
$Gender=" ";
$Total=" ";
$Pr=" ";
$Grade=" ";
$Department=" ";
if(isset($_POST["btnsubmit"])!=null)
{
	$fname=$_POST["txtfname"];
	$lname=$_POST["txtlname"];
	$Gender=$_POST["radio"];
	$Department=$_POST["seldepartment"];
	$M1=$_POST["txtmark1"];
	$M2=$_POST["txtmark2"];
	$M3=$_POST["txtmark3"];
	
	if($Gender=="Male")
	{
		$Name="Mr".$fname." ".$lname;
	}
	else
	{
	$Name="Miss" .$fname." ".$lname;
	}
	$Total=$M1+$M2+$M3;
	$Pr=($Total/300)*100;
	if($Pr>90)
	{
		$Grade="A+";
	}
	else if($Pr>80)
	{
		$Grade="A";
	}
	else if($Pr>70)
	{
		$Grade="B+";
	}
	else if($Pr>60)
	{
		$Grade="B";
	}
	else
	{
		$Grade="Failed";
	}
}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="413" border="1">
    <tr>
      <td width="167">First name</td>
      <td width="230"><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Last name</td>
      <td><label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radio" id="gender" value="Male" />
        Male
          <input type="radio" name="radio" id="fgender" value="Female" />
      <label for="fgender">Female</label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="seldepartment"></label>
        <select name="seldepartment" id="seldepartment">
        <option>---Select---</option>
          <option>BAA</option>
          <option >BCA</option>
          <option>Bs.cs</option>
          <option>B.com</option>
      </select></td>
    </tr>
    <tr>
      <td>Mark-1</td>
      <td><label for="txtmark1"></label>
      <input type="text" name="txtmark1" id="txtmark1" /></td>
    </tr>
    <tr>
      <td>Mark-2</td>
      <td><label for="txtmark2"></label>
      <input type="text" name="txtmark2" id="txtmark2" /></td>
    </tr>
    <tr>
      <td>Mark-3</td>
      <td><label for="txtmark3"></label>
      <input type="text" name="txtmark3" id="txtmark3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btm" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  <table width="936" border="1">
    <tr>
      <td width="150"> Name</td>
      <td width="174"><?php echo $Name ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $Gender ?></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><?php echo $Department ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $Total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
      <td><?php echo $Pr ?></td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $Grade ?></td>
    </tr>
  </table>
</form>
</body>
</html>