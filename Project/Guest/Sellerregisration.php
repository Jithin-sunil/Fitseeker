<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$Name=$_POST["txtname"];
  $Companyname=$_POST["txtcompanyname"];
	$Email=$_POST["txtemail"];
	$Contact=$_POST["txtcontact"];
	$Password=$_POST["password"];
  $Confirmpassword=$_POST["txtconfirmpassword"];
	$Address=$_POST["txtaddress"];
	$District=$_POST["seldistrict"];
	$Place=$_POST["selplace"];
  $Category=$_POST["selcategory"];
 
	
	
	$image=$_FILES["image"]["name"];
	$temp=$_FILES["image"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Sellerdocs/'.$image);
	
	
	$proof=$_FILES["proof"]["name"];
	$temps=$_FILES["proof"]["tmp_name"];
	move_uploaded_file($temps,'../Assets/Files/Sellerdocs/'.$proof);
	
  
	if($Confirmpassword==$Password)
  {
	$insqry="insert into tbl_seller(seller_name,seller_companyname,seller_contact,seller_email,seller_password,place_id,seller_image,seller_proof,seller_address,seller_doj,category_id)values('$Name','$Companyname','$Contact','$Email','$Password','$Place','$image','$proof','$Address',curdate(),'$Category')";
	
	if($con->query($insqry))
	{
		?>
            	<script>
				alert("Inserted")
				</script>
           		 <?php
	}

}
else
{
  ?>
        <script>
            alert("Confirmpassword is not equalto Password");
            window.location="Newuser.php";
        </script>
        <?php
}
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FitSeeker::Seller Registration</title>
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
</head>

<body>
    <div class="containers">
        <h1>Seller Registration</h1>
        <form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="txtname" id="txtname" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required /></td>
                </tr>
                <tr>
                    <td>Company Name</td>
                    <td><input type="text" name="txtcompanyname" id="txtcompanyname" title="Company Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="txtemail" id="txtemail" required onChange="emailCheck(this.value)" /></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" name="txtcontact" id="txtcontact" required pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaining 9 digits with 0-9" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="txtconfirmpassword" id="txtconfirmpassword" required /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea name="txtaddress" id="txtaddress" rows="4" required></textarea></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td>
                        <select name="seldistrict" required onChange="getPlace(this.value)">
                            <option value="---select---">---select---</option>
                            <?php
                                $selqurey="select*from tbl_district";
                                $result=$con->query($selqurey);
                                while($data=$result->fetch_assoc()) { 
                            ?>
                            <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><select name="selplace" id="sel_place" required><option value="---select---">---select---</option></select></td>
                </tr>
                <tr>
                    <td>Photo of Owner</td>
                    <td><input type="file" name="image" id="image" required /></td>
                </tr>
                <tr>
                    <td>Proof</td>
                    <td><input type="file" name="proof" id="proof" required /></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="selcategory" required onchange="getSubcategory(this.value)">
                            <option>---select---</option>
                            <?php
                                $selqurey="select * from tbl_category";
                                $result=$con->query($selqurey);
                                while($data=$result->fetch_assoc()) { 
                            ?>
                            <option value="<?php echo $data["category_id"]?>"><?php echo $data["category_name"]?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="center">
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