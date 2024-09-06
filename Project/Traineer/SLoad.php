
<?php
include("../Assets/Connection/Connection.php");
session_start();




 $selQry = "select * from tbl_schat dc inner join tbl_traineer u on (u.traineer_id=dc.schat_tosid) or (u.traineer_id=dc.schat_fromsid) where (dc.schat_fromuid=".$_GET['id']." or dc.schat_touid=".$_GET['id'].") and u.traineer_id='".$_SESSION["tid"]."' order by schat_datetime";
    $rowdis=$con->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["schat_fromuid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_user where user_id='".$_GET["id"]."'";
    $rowdis1=$con->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assets/Files/Userdocs/<?php echo $datadis1["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["user_name"] ?></span>
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
    <img src="../Assets/Files/Traineerdocs/<?php echo $datadis["traineer_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["traineer_name"] ?></span>
        <div class="message-text"><?php echo $datadis["schat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>