<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$description= $_POST["txtdescription"];
	
    $photo=$_FILES["filedoc"]["name"];
	$temp=$_FILES["filedoc"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Returnproducts/'.$photo);
	
	 $insqry="insert into tbl_returnproduct(return_discription,return_image,cart_id,return_date,user_id)values('$description','$photo','".$_GET['sid']."',curdate(),'".$_SESSION['uid']."')";
        ($con->query($insqry))
	
					?>
<script>
    alert("Retrun Registered")
    alert("You will get a respond in 7 working ")
</script>
<?php
			

	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            max-width: 500px;
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

        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9fafc;
            resize: none;
            height: 100px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        textarea:focus {
            border-color: #007bff;
        }

        input[type="file"] {
            padding: 10px;
            background-color: #f9fafc;
            border-radius: 8px;
            border: 1px solid #d1d9e6;
            cursor: pointer;
            width: 100%;
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

        @media (max-width: 500px) {
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
        <form action="" enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td><label for="txtdescription">Description</label></td>
                    <td><textarea name="txtdescription" id="txtdescription" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="filedoc">File</label></td>
                    <td><input type="file" name="filedoc" id="filedoc" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="center"><input type="submit" name="btnsubmit" value="Retrun Product"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>



<?php
include("Footer.php");
?>