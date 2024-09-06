<?php
$Name=" ";
$Gender=" ";
$Marital=" ";
$Department=" ";
$TA=" ";
$DA=" ";
$HRA=" ";
$LIC=" ";
$PF=" ";
$NET=" ";
$DET=" ";
if(isset($_POST["submit"])!=null)
{
	$fname=$_POST["txtfname"];
	$lname=$_POST["txtlname"];
	$gender=$_POST["gender"];
	$marital=$_POST["marial"];
	$department=$_POST["seldepartment"];
	$salary=$_POST["salary"];
	if(gender=="Male")
	{
		$Name="Mr.".$fname." ".$lname;
	}
	else if(gender=="Female" && marial=="single")
	{
		$Name="Miss".$fname." ".$lname;
	}
	else 
	{
		$Name="Mrs".$fname." ".$lname;
	}
	if($salary>=15000)
	{
		$TA=$salary*.4;
		$DA=$salary*.35;
		$HRA=$salary*.3;
		$LIC=$salary*.25;
		$PF=$salary*.2;
		$NET=$salary+$TA+$DA+$HRA-$LIC-$PF;
		$DET=$LIC+$PF;
	}
	else if($salary>=10000)
	{
		$TA=$salary*.35;
		$DA=$salary*.3;
		$HRA=$salary*.25;
		$LIC=$salary*.2;
		$PF=$salary*.15;
		$NET=$salary+$TA+$DA+$HRA-$LIC-$PF;
		$DET=$LIC+$PF;
	}
	else
	{
		$TA=$salary*.3;
		$DA=$salary*.25;
		$HRA=$salary*.2;
		$LIC=$salary*.15;
		$PF=$salary*.1;
		$NET=$salary+$TA+$DA+$HRA-$LIC-$PF;
		$DET=$LIC+$PF;
  }
}  
		
?>

<html>
<body>
<form id="form1" name="form1" method="post" action="">
<table width="398" boderr="1">
    <tr>
      <td width="166"><p>Firstname</p></td>
      <td width="216"><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Lastname</td>
      <td><label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="Male" id="rmale" value="Male" />
        <label for="rmale">Male</label>
        <input type="radio" name="Female" id="rfemale" value="Female" />
          <label for="rfemale">Female</label>
        <label for="rfemale"></label></td>
    </tr>
    <tr>
      <td>Marital</td>
      <td><input type="radio" name="marial" id="single" value="single" />
      <label for="single">Single
        <input type="radio" name="marial" id="married" value="married" />
      Married</label></td>
    </tr>
    <tr>
      <td><p>Department</p></td>
      <td><label for="seldepartment"></label>
        <select name="seldepartment" id="seldepartment">
         <option>---Select---</option>
          <option>Computer</option>
          <option >Lanuagae</option>
          <option>Finance</option>
          <option>Office</option>
      </select></td>
    </tr>
    <tr>
      <td><p>Basic Salary</p></td>
      <td><label for="salary"></label>
      <input type="text" name="salary" id="salary" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" />
      <input type="submit" name="cancel" id="cancel" value="cancel" /></td>
    </tr>
  </table>
<table width="387" border="1">
  <tr>
    <td width="167">Name</td>
    <td><?php echo $Name ?></td>
    <td width="204">&nbsp;</td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?php echo $Gender ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Marital</td>
    <td><?php echo $Marital ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Department</td>
    <td><?php echo $Department ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>TA</td>
    <td><?php echo $TA ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>DA</td>
    <td><?php echo $DA ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>HRA</td>
    <td><?php echo $HRA ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>LIC</p></td>
    <td><?php echo $LIC ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>PF</td>
    <td><?php echo $PF ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>NET</td>
    <td><?php echo $NET ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>DET</td>
    <td><?php echo $DET ?></td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
</body>
</html>