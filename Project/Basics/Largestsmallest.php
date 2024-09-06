<?php
$Largest=" ";
$Smallest=" ";
if(isset($_POST["btnfind"])!=null)
{
	$no1=$_POST["txtnumber1"];
	$no2=$_POST["txtnumber2"];
	$no3=$_POST["txtnumber3"];
	if($no1>$no2)
	{
		$large=$no1;
	}
	else
	{
		$large=$no2;
	}
	if($large>$no3)
	{
		$largest="largest=".$no3;
	}
	else
	{
		$Largest="largest=".$large;
	}
	if($no1<$no2)
	{
		$Small=$no1;
	}
	else
	{
		$Small=$no2;
	}
	if($Small<$no3)
	{
	$Smallest="Smallest=".$Small;
	}
	else
	{
		$Smallest="Smallest=".$Small;
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
  <table width="507" border="1">
    <tr>
      <td width="147"><p>Number-1</p></td>
      <td width="162"><label for="txtnumber1"></label>
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Number-2</td>
      <td><label for="txtnumber2"></label>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td>Number-3</td>
      <td><label for="txtnumber3"></label>
      <input type="text" name="txtnumber3" id="txtnumber3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnfind" id="btnfind" value="Find" /></td>
    </tr>
    <tr>
      <td>Largest_number</td>
      <td><?php echo $Largest ?></td>
    </tr>
    <tr>
      <td>Smallest_number</td>
      <td><?php echo $Smallest ?></td>
    </tr>
  </table>
</form>
</body>
</html>