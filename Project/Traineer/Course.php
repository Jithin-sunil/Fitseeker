<?php
include('../Assets/Connection/Connection.php');

// session_start();

include('Header.php');

if(isset($_POST["btnsubmit"]))
{
	$Course_type=$_POST["selcoursetype"];
	$Course=$_POST["txtcourse"];
	$Coursedetails=$_POST["txtcoursedetails"];
	$trainer=$_SESSION["tid"];
	$insqry="insert into tbl_course(course_name,coursetype_id,course_details,traineer_id)values('$Course','$Course_type','$Coursedetails','$trainer')";
	if($con->query($insqry))
	{
    ?>
    <script>
      alert("Inserted!")
      </script>
    <?php
		// echo "inserted";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::Course</title>
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
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 5px; /* Adds space between rows, including <th> */
    margin-top: 10px;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #1976d2;
    color: #fff;
    font-weight: bold;
}

td {
    background-color: #f8f9fa;
}

tr:first-child th:first-child {
    border-top-left-radius: 8px;
}

tr:first-child th:last-child {
    border-top-right-radius: 8px;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 8px;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 8px;
}

select, input[type="text"] {
    width: calc(100% - 30px);
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
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
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
  <h1 style="text-align: center; color: #1976d2;">Course Registration</h1>
  <table>
    <tr>
      <th>
        <div>Course Type</div>
      </th>
      <td>
        <select name="selcoursetype" id="selcoursetype" required>
          <option value="">---select---</option>
          <?php
            $selqurey="select * from tbl_coursetype";
            $result=$con->query($selqurey);
            while($data=$result->fetch_assoc())
            { 
          ?>
          <option value="<?php echo $data["coursetype_id"]?>">
          <?php echo $data["coursetype_name"]?>
          </option>
          <?php
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>
        <div>Course</div>
      </th>
      <td>
        <input type="text" name="txtcourse" id="txtcourse" required/>
      </td>
    </tr>
    <tr>
      <th>
        <div>Course Details</div>
      </th>
      <td>
        <input type="text" name="txtcoursedetails" id="txtcoursedetails" required />
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </td>
    </tr>
  </table>
</form>

<script>
function validateForm() {
    var courseType = document.getElementById('selcoursetype').value;
    var course = document.getElementById('txtcourse').value.trim();
    var courseDetails = document.getElementById('txtcoursedetails').value.trim();

    if (courseType === "") {
        alert("Please select a Course Type.");
        return false;
    }

    if (course === "") {
        alert("Please enter the Course.");
        return false;
    }

    if (courseDetails === "") {
        alert("Please enter the Course Details.");
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