<?php
$Result=" ";
if(isset($_POST["btnplus"])!=null)
{
	$no1=$_POST["txtnumber1"];
	$no2=$_POST["txtnumber2"];
	$sum=$no1+$no2;
	$Result="sum=".$sum;
}
if(isset($_POST["btnminus"])!=null)
{
	$no1=$_POST["txtnumber1"];
	$no2=$_POST["txtnumber2"];
	$sum=$no1-$no2;
	$Result="Difference=".$sum;
}
if(isset($_POST["btnmultiply"])!=null)
{
	$no1=$_POST["txtnumber1"];
	$no2=$_POST["txtnumber2"];
	$sum=$no1*$no2;
	$Result="Multipication=".$sum;
}
if(isset($_POST["btndivision"])!=null)
{
	$no1=$_POST["txtnumber1"];
	$no2=$_POST["txtnumber2"];
	$sum=$no1/$no2;
	$Result="Division=".$sum;
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
  <table width="441" border="1">
    <tr>
      <td width="56">Number-1</td>
      <td width="369"><label for="txtnumber1"></label>
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Number-2</td>
      <td><label for="txtnumber2"></label>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnplus" id="btnplus" value="+" />
      <input type="submit" name="btnminus" id="btnminus" value="-" />
      <input type="submit" name="btnmultiply" id="btnmultiply" value="*" />
      <input type="submit" name="btndivision" id="btndivision" value="/" /></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $Result ?></td>
    </tr>
  </table>
</form>
</body>
</html>