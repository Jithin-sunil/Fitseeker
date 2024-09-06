<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$Achievement=$_POST["txtachievement"];
	
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Traineerdocs/Achievement/'.$photo);
	
	$Details=$_POST["txtdetails"];
	$trainer=$_SESSION["tid"];
	$insqry="insert into tbl_achievement(achievement_name,achievement_photo,achievement_details,traineer_id)values('$Achievement','$photo','$Details','$trainer')";
		if($con->query($insqry))
	{
		echo "inserted";
	}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Achievement</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #e3f2fd;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-content: space-around;
    flex-direction: column;

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 500px;
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

td {
    padding: 10px;
}

td:first-child {
    font-weight: bold;
    background-color: #1976d2;
    color: #ffffff;
    text-align: right;
}

td:last-child {
    background-color: #f8f9fa;
}

input[type="text"], input[type="file"], textarea {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

textarea {
    height: 100px;
    resize: vertical;
}

input[type="text"]:focus, input[type="file"]:focus, textarea:focus {
    border-color: #1976d2;
    outline: none;
}

input[type="submit"] {
    background-color: #1976d2;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #1565c0;
}

input[type="submit"]:active {
    background-color: #0d47a1;
}
</style>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm()">
  <h2 style="text-align: center; color: #1976d2;">Add Achievement</h2>
  <table>
    <tr>
      <td>Achievement</td>
      <td><input type="text" name="txtachievement" id="txtachievement" required /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="photo" id="photo" accept="image/*" required /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><textarea name="txtdetails" id="txtdetails" required></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </td>
    </tr>
  </table>
</form>

<script>
function validateForm() {
    var achievement = document.getElementById('txtachievement').value.trim();
    var photo = document.getElementById('photo').files.length;
    var details = document.getElementById('txtdetails').value.trim();

    if (achievement === "") {
        alert("Please enter the achievement.");
        return false;
    }

    if (photo === 0) {
        alert("Please select a photo.");
        return false;
    }

    if (details === "") {
        alert("Please enter the details.");
        return false;
    }

    return true; // Form is valid
}
</script>

</body>
</html>


<?php
include('Footer.php');
?>