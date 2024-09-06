<?php

include ('../Assets/Connection/Connection.php');
include ('Header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitSeeker::View More</title>
</head>

<body>
    <div class="team section" id="team">
        <div class="container">
            <div class="row">

                <?php
                $selqurey = "select * from tbl_traineer u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id=d.district_id where traineer_id='".$_GET["tid"]."'" ;
                $result = $con->query($selqurey);
                $data = $result->fetch_assoc();

                ?>

                <div class="col-lg-12 col-md-12" style="margin-top:130px !important">
                    <div class="team-member">
                        <div class="main-content">
                            <img src="../Assets/Files/Traineerdocs/<?php echo $data["traineer_photo"] ?>" height="200"
                                width="500" alt="">
                            <h1><?php echo $data["traineer_name"] ?></h1>
                            <br>
                            <h5><?php echo $data["traineer_email"] ?></h5>
                            <h5><?php echo $data["traineer_contact"] ?></h5>
                            
                            <h4><?php echo $data["traineer_address"] ?></h4>
                            <h4><?php echo $data["place_name"] ?></h4>
                            <h4><?php echo $data["district_name"] ?></h4>
                            
                            <span>
                                <?php


                                $average_rating = 0;
                                $total_review = 0;
                                $five_star_review = 0;
                                $four_star_review = 0;
                                $three_star_review = 0;
                                $two_star_review = 0;
                                $one_star_review = 0;
                                $total_user_rating = 0;
                                $review_content = array();

                                $query = "SELECT * FROM tbl_rating where traineer_id = '" . $data["traineer_id"] . "' ORDER BY rating_id DESC";

                                $resultRating = $con->query($query);

                                while ($row = $resultRating->fetch_assoc()) {


                                    if ($row["rating_value"] == '5') {
                                        $five_star_review++;
                                    }

                                    if ($row["rating_value"] == '4') {
                                        $four_star_review++;
                                    }

                                    if ($row["rating_value"] == '3') {
                                        $three_star_review++;
                                    }

                                    if ($row["rating_value"] == '2') {
                                        $two_star_review++;
                                    }

                                    if ($row["rating_value"] == '1') {
                                        $one_star_review++;
                                    }

                                    $total_review++;

                                    $total_user_rating = $total_user_rating + $row["rating_value"];

                                }


                                if ($total_review == 0 || $total_user_rating == 0) {
                                    $average_rating = 0;
                                } else {
                                    $average_rating = $total_user_rating / $total_review;
                                }

                                ?>
                                <p align="center" style="color:#F96;font-size:20px">
                                    <?php
                                    if ($average_rating == 5 || $average_rating == 4.5) {
                                        ?>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <?php
                                    }
                                    if ($average_rating == 4 || $average_rating == 3.5) {
                                        ?>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <?php
                                    }
                                    if ($average_rating == 3 || $average_rating == 2.5) {
                                        ?>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <?php
                                    }
                                    if ($average_rating == 2 || $average_rating == 1.5) {
                                        ?>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <?php
                                    }
                                    if ($average_rating == 1) {
                                        ?>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <?php
                                    }
                                    if ($average_rating == 0) {
                                        ?>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                        <?php
                                    }
                                    ?>

                                </p>
                                <?php

                                $output = array(
                                    'average_rating' => number_format($average_rating, 1),
                                    'total_review' => $total_review,
                                    'five_star_review' => $five_star_review,
                                    'four_star_review' => $four_star_review,
                                    'three_star_review' => $three_star_review,
                                    'two_star_review' => $two_star_review,
                                    'one_star_review' => $one_star_review,
                                    'review_data' => $review_content
                                );
                                ?>

                            </span>
                            <ul class="social-icons">
                            <td></td> <a href="viewcourse.php?cid=<?php echo $data["traineer_id"] ?>">View 
                                Course</a></td>
                                <br>
                            <td><a href="Viewgallery.php?gid=<?php echo $data["traineer_id"] ?>">View Gallery</a></td>
                            <br>
                            <td><a href="viewachivements.php?aid=<?php echo $data["traineer_id"] ?>">View
                                    Achievements</a></td>
                                    <br>
                            <td><a href="sChat.php?id=<?php echo $data["traineer_id"] ?>">Chat with Me</a></td>
                            <br>
                            <td><a href="Viewdemovideo.php?id=<?php echo $data["traineer_id"] ?>">Demo classes</a></td>

                            </ul>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>



</body>
</html>



<?php
include ('Footer.php');
?>
