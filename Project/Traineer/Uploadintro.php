<?php

include('../Assets/Connection/Connection.php');

include('Header.php');

if(isset($_POST["btnsubmit"]))
{
    $Discription=$_POST["Discription"];

$Video=$_FILES["Video"]["name"];
$temp=$_FILES["Video"]["tmp_name"];
move_uploaded_file($temp,'../Assets/Files/Traineerdocs/Videos/'.$Video);

$trainer=$_SESSION["tid"];

	$insqry="insert into tbl_video(video_discription,video_video,traineer_id)value('$Discription','$Video','$trainer')";

    if($con->query($insqry))
	{
		?>
            	<script>
				alert("Inserted")
				</script>
           		 <?php
	}

}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Upload Video</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f7f9fc;
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
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: transparent;
    color: #1976d2;
    font-weight: bold;
    font-size: 14px;
    text-transform: uppercase;
}

td {
    background-color: transparent;
    padding: 0;
}

input[type="text"], input[type="file"] {
    width: calc(100% - 20px);
    padding: 12px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
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
    padding: 15px 0;
    border: none;
    border-radius: 8px;
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

#video-error, #description-error {
    color: #d32f2f;
    font-size: 12px;
    margin-top: 5px;
}
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2" onsubmit="return validateForm()">
  <h2 style="text-align: center; color: #1976d2;">Upload Video</h2>
  <table>
    <tr>
      <th>Description</th>
      <td>
        <input type="text" name="Discription" id="Discription" />
        <span id="description-error"></span>
      </td>
    </tr>
    <tr>
      <th>Video</th>
      <td>
        <input type="file" name="Video" id="Video" />
        <span id="video-error"></span>
      </td>
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
  var isValid = true;

  // Validate Description
  var description = document.getElementById('Discription').value.trim();
  if (description === "") {
    document.getElementById('description-error').innerHTML = 'Description is required.';
    isValid = false;
  } else {
    document.getElementById('description-error').innerHTML = '';
  }

  // Validate Video File
  var fileInput = document.getElementById('Video');
  var file = fileInput.files[0];
  if (!file) {
    document.getElementById('video-error').innerHTML = 'Please select a video file.';
    isValid = false;
  } else {
    var fileType = file.type;
    var videoTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/flv', 'video/webm'];
    if (!videoTypes.includes(fileType)) {
      document.getElementById('video-error').innerHTML = 'Invalid file type. Please upload a video file.';
      isValid = false;
    } else {
      document.getElementById('video-error').innerHTML = '';
    }
  }

  return isValid;
}
</script>

</body>
</html>


<?php
include('Footer.php');
?>
  