<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$Name= $_POST["txtname"];
	$Gender=$_POST["radio"];
	$Contact=$_POST["txtcontact"];
	$Email=$_POST["txtemail"];
	$Password=$_POST["txtpassword"];
  $Confirmpassword=$_POST["txtconfirmpassword"];
	$District=$_POST["seldistrict"];
	$Place=$_POST["selplace"];
	$Address=$_POST["txtaddress"];
  $DOB=$_POST["date"];
	
	
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Userdocs/'.$photo);
	
	$proof=$_FILES["proof"]["name"];
	$tempp=$_FILES["proof"]["tmp_name"];
	move_uploaded_file($tempp,'../Assets/Files/Userdocs/'.$proof);

	if($Confirmpassword==$Password)
  {
	$insqry="insert into tbl_user(user_name,user_gender,user_contact,user_email,user_password,place_id,user_photo,user_proof,user_address,user_dob)values('$Name','$Gender','$Contact','$Email','$Password','$Place','$photo','$proof','$Address','$DOB')";
	if($con->query($insqry))
	{
    ?>
        <script>
            alert("inserted");
            window.location="Login.php";
        </script>
        <?php
		// echo "inserted";
	}
}
else
{
  ?>
        <script>
            alert("Password  mismatch");
            window.location="Newuser.php";
        </script>
        <?php
}
}
?>









<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FitSeeker::New User</title>
    <script src="../Assets/JQ/jQuery.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        .containers {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 15px;
            vertical-align: middle;
        }

        input[type="text"], input[type="email"], input[type="password"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        input[type="file"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"], input[type="reset"] {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 0;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
        }

        textarea {
            resize: none;
        }

        td {
            text-align: left;
            font-weight: bold;
            color: #555;
        }

        .center {
            text-align: center;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            table td {
                display: block;
                width: 100%;
            }
        }
    </style>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function (result) {
                    $("#sel_place").html(result);
                }
            });
        }

        function emailCheck(email) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxEmail.php?email=" + email,
                success: function (result) {
                    if (result.trim() == "exists") {
                        alert("Email already exists. Please use a different email.");
                        $("#txtemail").val("");
                        $("#txtemail").focus();
                    }
                }
            });
        }
    </script>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitSeeker::New User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="../Assets/JQ/jQuery.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            min-height: 100vh;
        }

        .containers {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 12px;
            vertical-align: top;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9fafc;
            margin-top: 5px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="date"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
        }

        input[type="file"] {
            padding: 10px;
            background-color: #f9fafc;
            border-radius: 8px;
            border: 1px solid #d1d9e6;
            cursor: pointer;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        .gender-options label {
            margin-right: 20px;
            font-weight: 400;
        }

        .action-buttons {
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
                margin: 10px;
            }

            table td {
                padding: 10px;
            }
        }
    </style>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function(result) {
                    $("#sel_place").html(result);
                }
            });
        }

        function emailCheck(email) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxEmail.php?email=" + email,
                success: function(result) {
                    if (result.trim() == "exists") {
                        alert("Email already exists. Please use a different email.");
                        $("#txtemail").val("");
                        $("#txtemail").focus();
                    }
                }
            });
        }
    </script>
</head>

<body>
    <div class="containers">
        <h2>New User Registration</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table>
                <tr>
                    <td><label for="txtname">Name</label></td>
                    <td><input type="text" name="txtname" id="txtname" title="Name Allows Only Alphabets, Spaces, and the First Letter Must Be Capitalized" pattern="^[A-Z]+[a-zA-Z ]*$" required /></td>
                </tr>
                <tr>
                    <td><label>Gender</label></td>
                    <td class="gender-options">
                        <label><input type="radio" name="radio" id="male" value="male" required /> Male
                        <input type="radio" name="radio" id="female" value="female" required /> Female</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="txtcontact">Contact</label></td>
                    <td><input type="text" name="txtcontact" id="txtcontact" pattern="[6-9]{1}[0-9]{9}" title="Phone number should start with 6-9 and followed by 9 digits" required /></td>
                </tr>
                <tr>
                    <td><label for="txtemail">Email</label></td>
                    <td><input type="email" name="txtemail" id="txtemail" required onchange="emailCheck(this.value)" /></td>
                </tr>
                <tr>
                    <td><label for="txtpassword">Password</label></td>
                    <td><input type="password" name="txtpassword" id="txtpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" required /></td>
                </tr>
                <tr>
                    <td><label for="txtconfirmpassword">Confirm Password</label></td>
                    <td><input type="password" name="txtconfirmpassword" id="txtconfirmpassword" required /></td>
                </tr>
                <tr>
                    <td><label for="date">Date of Birth</label></td>
                    <td><input type="date" name="date" id="date" max="<?php echo date('Y-m-d'); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="seldistrict">District</label></td>
                    <td>
                        <select name="seldistrict" required onchange="getPlace(this.value)">
                            <option value="---select---">---select---</option>
                            <?php
                            $selqurey = "select*from tbl_district";
                            $result = $con->query($selqurey);
                            while ($data = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="sel_place">Place</label></td>
                    <td>
                        <select name="selplace" id="sel_place" required>
                            <option value="---select---">---select---</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="photo">Photo</label></td>
                    <td><input type="file" name="photo" id="photo" required /></td>
                </tr>
                <tr>
                    <td><label for="proof">Proof</label></td>
                    <td><input type="file" name="proof" id="proof" required /></td>
                </tr>
                <tr>
                    <td><label for="txtaddress">Address</label></td>
                    <td><textarea name="txtaddress" id="txtaddress" required></textarea></td>
                </tr>
                <tr class="action-buttons">
                    <td colspan="2">
                        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>



<?php
include('Footer.php');
?>
<!-- 
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }
  function emailCheck(email)
  {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxEmail.php?email=" + email,
      success: function (result) {
       alert(result)

        
      }
    });
  }
</script> -->