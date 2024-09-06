<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
$flag=0;
if(isset($_POST["btnsubmit"]))
{
    $Name=$_POST["txtname"];
    $Gender=$_POST["radio"];
    $Email=$_POST["txtemail"];
    $Contact=$_POST["txtcontact"];
    $Password=$_POST["password"];
    $Confirmpassword=$_POST["txtconfirmpassword"];
    $Dob=$_POST["Dob"];
    $Address=$_POST["txtaddress"];
    $District=$_POST["seldistrict"];
    $Place=$_POST["selplace"];
    $Course_type=$_POST["selcoursetype"];
    $Course=$_POST["txtcourse"];
    $Experiance=$_POST["Experiance"];
    
    $image=$_FILES["image"]["name"];
    $temp=$_FILES["image"]["tmp_name"];
    move_uploaded_file($temp,'../Assets/Files/Traineerdocs/Image/'.$image);
    
    $proof=$_FILES["proof"]["name"];
    $temps=$_FILES["proof"]["tmp_name"];
    move_uploaded_file($temps,'../Assets/Files/Traineerdocs/Proof/'.$proof);

    // $Qualification=$_FILES["Qualification"]["name"];
    // $temp=$_FILES["Qualification"]["tmp_name"];
    // move_uploaded_file($temp,'../Assets/Files/Traineerdocs/Qualification/'.$Qualification);
    

    $photos=$_FILES['Qualification'];
    for ($i = 0; $i < count($photos['name']); $i++) {
        $photoName = $photos['name'][$i];
        $photoTmpName = $photos['tmp_name'][$i];
        move_uploaded_file($photoTmpName, '../Assets/Files/Traineerdocs/Qualification/'.$photoName);
        // $query = "INSERT INTO tbl_traineer (traineer_qualification) VALUES ('$photoName')";
        // if($con->query($query))
        // {
        //     $flag++;
        // }
    }
    if($Confirmpassword==$Password)
    {
        $insqry="insert into tbl_traineer(traineer_name,traineer_contact,traineer_email,traineer_password,place_id,traineer_photo,traineer_proof,traineer_address,traineer_dob,traineer_qualification,traineer_experience,traineer_course,course_id,traineer_gender) values('$Name','$Contact','$Email','$Password','$Place','$image','$proof','$Address','$Dob','$photoName','$Experiance','$Course','$Course_type','$Gender')";
        
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
            alert("Password mismatch");
            // window.location="Traineerregisration.php";
        </script>
        <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitSeeker::Trainer Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="../Assets/JQ/jQuery.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-content: space-around;
    flex-direction: column;
        }

        .containers {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 600px;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
        }

        table tr td {
            padding: 10px;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="date"], input[type="file"], select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #00c6ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 45%;
            margin-top: 10px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0072ff;
        }

        .button-container {
            text-align: center;
        }

        small {
            display: block;
            margin-top: 5px;
            color: red;
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
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
                    if (result.trim() === "exists") {
                        alert("Email already exists. Please use a different email.");
                        $("#txtemail").val("");
                        $("#txtemail").focus();
                    }
                }
            });
        }

        function validateAge() {
            const dob = new Date(document.getElementById("Dob").value);
            const ageDifMs = Date.now() - dob.getTime();
            const ageDate = new Date(ageDifMs); // milliseconds from epoch
            const age = Math.abs(ageDate.getUTCFullYear() - 1970);

            const dobWarning = document.getElementById("dobWarning");
            if (age < 18) {
                dobWarning.style.display = "block";
            } else {
                dobWarning.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <div class="containers">
        <h2>Trainer Registration</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="txtname" id="txtname" title="Name allows only alphabets, spaces and first letter must be capital" pattern="^[A-Z]+[a-zA-Z ]*$" required />
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="radio" id="male" value="male" required /> Male
                        <input type="radio" name="radio" id="female" value="female" required /> Female
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="txtemail" id="txtemail" autocomplete="off" required onChange="emailCheck(this.value)" />
                    </td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" name="txtcontact" id="txtcontact" autocomplete="off" required pattern="[6-9]{1}[0-9]{9}" title="Phone number must start with 6-9 and contain 10 digits" />
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters" required />
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="txtconfirmpassword" id="txtconfirmpassword" required />
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>
                        <input type="date" name="Dob" id="Dob" max="<?php echo date('Y-m-d'); ?>" required oninput="validateAge()" />
                        <small id="dobWarning" style="display: none;">You must be at least 18 years old to register.</small>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="txtaddress" id="txtaddress" required></textarea>
                    </td>
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
                    <td>Photo</td>
                    <td>
                        <input type="file" name="image" id="image" required />
                    </td>
                </tr>
                <tr>
                    <td>Proof</td>
                    <td>
                        <input type="file" name="proof" id="proof" required />
                    </td>
                </tr>
                <tr>
                    <td>Course Type</td>
                    <td>
                            <select name="selcoursetype" required onChange="getCourse(this.value)">
                            <option value="---select---">---select---</option>
                            <?php
                                $selqurey="select*from tbl_coursetype";
                                $result=$con->query($selqurey);
                                while($data=$result->fetch_assoc()) { 
                            ?>
                            <option value="<?php echo $data["coursetype_id"]?>"><?php echo $data["coursetype_name"]?></option>
                            <?php } ?>
                        </select>
                            <!-- PHP dynamic options here -->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Course</td>
                    <td>
                        <input type="text" name="txtcourse" id="txtcourse" required />
                    </td>
                </tr>
                <tr>
                    <td>Qualifications</td>
                    <td>
                        <input type="file" name="Qualification[]" id="Qualification[]" multiple required />
                    </td>
                </tr>
                <tr>
                    <td>Experience</td>
                    <td>
                        <textarea name="Experiance" id="Experiance" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
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
    function validateAge() {
        const dob = document.getElementById("Dob").value;
        const dobWarning = document.getElementById("dobWarning");
        const today = new Date();
        const birthDate = new Date(dob);
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        if (age < 18) {
            dobWarning.style.display = "block";
        } else {
            dobWarning.style.display = "none";
        }
    }
</script>