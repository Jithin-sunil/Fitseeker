<?php
session_start();
if(!(isset($_SESSION['tid']) && !empty($_SESSION['tid']))) {
    header("location:../Index.php");
}
?>