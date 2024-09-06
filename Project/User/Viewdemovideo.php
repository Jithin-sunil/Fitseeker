<?php

include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::View Demo Video</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-content: space-around;
    flex-direction: column;
}

button {
    background-color: #1976d2;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    margin-bottom: 20px;
    transition: background-color 0.3s, color 0.3s;
}

button:hover {
    background-color: #1565c0;
}

button:active {
    background-color: #0d47a1;
}

button:focus {
    outline: none;
}

table {
    width: 100%;
    max-width: 800px;
    border-collapse: collapse;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #1976d2;
    color: #ffffff;
    font-weight: bold;
}

td {
    background-color: #ffffff;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

video {
    border: 1px solid #ddd;
    border-radius: 4px;
}
</style>
</head>

<body>
<table>
    <thead>
        <tr>
            <th>Video Description</th>
            <th>Video</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selqurey="select * from tbl_video where traineer_id='".$_GET["id"]."'";
        $result=$con->query($selqurey);
        while($data=$result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($data["video_discription"]) ?></td>
                <td>
                    <a href="../Assets/Files/Traineerdocs/Videos/<?php echo htmlspecialchars($data["video_video"]) ?>" target="_blank">
                        <video src="../Assets/Files/Traineerdocs/Videos/<?php echo htmlspecialchars($data["video_video"]) ?>" width="150" height="100" controls></video>
                    </a>
                </td>
            </tr>
            <?php
        } 
        ?> 
    </tbody>
</table>
<br>
<br>
<!-- Go Back Button -->
<form action="Viewtraineer.php">
    <button type="submit">Go Back</button>
</form>
</body>
</html>


<?php
include('Footer.php');
?>