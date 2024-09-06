<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
 if(isset($_POST["btnsubmit"]))
{
	$complaint= $_POST["txtcomplaint"];
	$complainttitle=$_POST["txtcomplainttiltle"];
	
	 $insqry="insert into tbl_complaint(complaint_title,complaint_complaint,complaint_date,user_id,product_id)values('$complainttitle','$complaint',curdate(),'".$_SESSION['uid']."','".$_GET['cid']."')";
	($con->query($insqry))
	
					?>
            	<script>
				alert("Complaint Registered")
				alert("You will get a respond in 7 working ")
				</script>
           		 <?php
			

	}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitSeeker::Complaint</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-content: space-around;
            flex-direction: column;
        }

        .containers {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 12px;
            vertical-align: middle;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9fafc;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #007bff;
        }

        input[type="submit"] {
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .center {
            text-align: center;
        }

        @media (max-width: 400px) {
            .container {
                padding: 20px;
                margin: 10px;
            }

            td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="containers">
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td><label for="txtcomplainttiltle">Complaint Title</label></td>
                    <td><input type="text" name="txtcomplainttiltle" id="txtcomplainttiltle" required /></td>
                </tr>
                <tr>
                    <td><label for="txtcomplaint">Complaint</label></td>
                    <td><input type="text" name="txtcomplaint" id="txtcomplaint" required /></td>
                </tr>
                <tr>
                    <td colspan="2" class="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>


<?php
include('Footer.php');
?>