<?php
include('../Assets/Connection/Connection.php');
// session_start();

include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$Caption=$_POST["txtcaption"];
	
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Traineerdocs/Gallery/'.$photo);
	$trainer=$_SESSION["tid"];
		$insqry="insert into tbl_gallery(gallery_name,gallery_photo,traineer_id)values('$Caption','$photo','$trainer')";
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
<title>FitSeeker::Gallery</title>
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
}

form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 350px;
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: transparent;
    color: #1976d2;
    font-weight: bold;
    padding-bottom: 5px;
    text-transform: uppercase;
    font-size: 14px;
}

td {
    background-color: transparent;
    padding: 0;
}

input[type="text"], input[type="file"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input[type="text"]:focus, input[type="file"]:focus {
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
  <h2 style="text-align: center; color: #1976d2;">Add to Gallery</h2>
  <table>
    <tr>
      <th>Caption</th>
      <td><input type="text" name="txtcaption" id="txtcaption" required /></td>
    </tr>
    <tr>
      <th>Photo</th>
      <td><input type="file" name="photo" id="photo" accept="image/*" required /></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Add" />
      </td>
    </tr>
  </table>
</form>

<script>
function validateForm() {
    var caption = document.getElementById('txtcaption').value.trim();
    var photo = document.getElementById('photo').files.length;

    if (caption === "") {
        alert("Please enter a caption.");
        return false;
    }

    if (photo === 0) {
        alert("Please select a photo to upload.");
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