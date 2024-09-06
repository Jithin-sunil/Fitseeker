<?php
include('../Assets/Connection/Connection.php');
// session_start();
include('Header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FitSeeker::My Request</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eaeef1;
        margin: 0;
        padding: 0;
        display: flex;
        height: 88vh;
        align-content: space-around;
        flex-direction: column;
    }

    .request-box {
        width: 85%;
        max-width: 900px;
        margin: 20px auto;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 12px;
        overflow: hidden;
        padding: 20px;
    }

    .request-box .header {
        background-color: #007bff;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-size: 14px;
        padding: 10px;
        border-bottom: 1px solid #dddddd;
    }

    .request-box .content {
        padding: 20px;
    }

    .request-box .content .row {
        background-color: #f7f9fc;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .request-box .content .row:hover {
        background-color: #e9f2ff;
    }

    .request-box .content .row .trainer-photo {
    width: 100px;
    height: 100px;
    border-radius: 100%;
    margin-right: 10px;
    }

    .request-box .content .row .trainer-info {
        display: flex;
        flex-direction: column;
    }

    .request-box .content .row .status {
        font-weight: bold;
        color: #007bff;
        margin-top: 10px;
    }

    .request-box .content .row .status a {
        text-decoration: none;
        color: #007bff;
    }

    .request-box .content .row .status a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>

<div class="request-box">
    <div class="header">
        My Requests
    </div>
    <div class="content">
        <?php
        $selqurey="select * from tbl_request r  inner join tbl_course c on r.course_id=c.course_id inner join tbl_coursetype o on c.coursetype_id=o.coursetype_id inner join tbl_traineer t on c.traineer_id=t.traineer_id where user_id='".$_SESSION['uid']."' " ;
        $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
        {
            $i++;
        ?>
            <div class="row">
                <img src="../Assets/Files/Traineerdocs/<?php echo $data["traineer_photo"] ?>" class="trainer-photo" />
                <div class="trainer-info">
                    <div>Trainer Name: <?php echo $data["traineer_name"] ?></div>
                    <div>Course Type: <?php echo $data["coursetype_name"] ?></div>
                    <div>Course: <?php echo $data["course_name"] ?></div>
                    <div class="status">
                        <?php
                        if($data['request_status']=='0')
                        {
                            echo 'Pending';
                        }
                        else if($data['request_status']=='1')
                        {
                            echo 'Accepted';
                            echo '<br>';
                            echo '<a href="Ratingtrainner.php?tid='.$data["traineer_id"].'">Now Rate The Trainer</a>';
                        }
                        else
                        {
                            echo 'Rejected';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        } 
        ?> 
    </div>
</div>
		
</body>
</html>


<?php
include('Footer.php');
?>