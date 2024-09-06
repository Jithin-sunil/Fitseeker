<?php
include('../Connection/Connection.php');

if(isset($_GET["email"])) {
    $email = $_GET["email"];

    // Check email in tbl_traineer
    $query1 = "SELECT * FROM tbl_traineer WHERE traineer_email='$email'";
    $result1 = $con->query($query1);

    // Check email in tbl_user
    $query2 = "SELECT * FROM tbl_user WHERE user_email='$email'";
    $result2 = $con->query($query2);

    // Check email in tbl_admin
    $query3 = "SELECT * FROM tbl_admin WHERE admin_email='$email'";
    $result3 = $con->query($query3);

    // If email exists in any of the tables
    if($result1->num_rows > 0 || $result2->num_rows > 0 || $result3->num_rows > 0) {
        echo "exists";
    } else {
        echo "available";
    }
}
?>
