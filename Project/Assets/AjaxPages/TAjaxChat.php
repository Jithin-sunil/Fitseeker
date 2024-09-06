<?php
include("../Connection/Connection.php");
session_start();

    $insQry="insert into tbl_schat (schat_fromsid,schat_touid,schat_content,schat_datetime) values('".$_SESSION["tid"]."','".$_GET["id"]."','".$_GET["chat"]."',DATE_FORMAT(sysdate(), '%M %d %Y, %h:%i %p'))";
    if($con->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
    }
    
?>