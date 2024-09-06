
<?php
include("../Assets/Connection/Connection.php");
session_start();




$selQry = "select * from tbl_schat dc inner join tbl_user u on (u.user_id=dc.schat_touid) or (u.user_id=dc.schat_fromuid) where (dc.schat_fromsid =".$_GET["id"]." or dc.schat_tosid = ".$_GET["id"].") and u.user_id='".$_SESSION["uid"]."' order by schat_datetime";
    $rowdis=$con->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["schat_fromsid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_traineer where traineer_id='".$_GET["id"]."'";
    $rowdis1=$con->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assets/Files/Traineerdocs/<?php echo $datadis1["traineer_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["traineer_name"] ?></span>
        <div class="message-text"><?php echo $datadis["schat_content"] ?></div>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
        }

} else {
    
?>
<div class="chat-message is-sent">
    <img src="../Assets/Files/Userdocs/<?php echo $datadis["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["user_name"] ?></span>
        <div class="message-text"><?php echo $datadis["schat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>