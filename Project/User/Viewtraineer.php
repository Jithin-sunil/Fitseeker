<?php

include ('../Assets/Connection/Connection.php');
include ('Header.php');
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>FitSeeker::View Trainer </title>
</head>

<body>
<table align="right">
    <tr>
        <td>Coursetype</td>
        <td>
            <select name="selcoursetype" id="sel_coursetype" onchange="Search()">
                <option value="">---select---</option>
                <?php
                $selqurey = "select * from tbl_coursetype";
                $result = $con->query($selqurey);
                while ($data = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $data["coursetype_id"] ?>">
                        <?php echo $data["coursetype_name"] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>District</td>
        <td>
            <select name="seldistrict" id="sel_district" required onchange="getPlace(this.value); Search()">
                <option value="">---select---</option>
                <?php
                $sel = "select * from tbl_district";
                $r = $con->query($sel);
                while ($row = $r->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["district_id"] ?>">
                        <?php echo $row["district_name"] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Place</td>
        <td>
            <select name="selplace" id="sel_place" onchange="Search()">
                <option value="">---select---</option>
            </select>
        </td>
    </tr>
</table>


    <div class="team section" id="team">
        <div class="container" id="result">
            <div class="row">


                <?php
               $selqurey = "select * from tbl_traineer u inner join tbl_place p on u.place_id = p.place_id  inner join tbl_district d on p.district_id=d.district_id inner join tbl_coursetype q on u.course_id=q.coursetype_id where u.traineer_status='1'";
                $result = $con->query($selqurey);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                    $i++;
                    ?>
                <div class="col-lg-3 col-md-6 mt-5" style="margin-top:130px !important">

                    <div class="team-member">

                        <div class="main-content">
                            <img src="../Assets/Files/Traineerdocs/<?php echo $data["traineer_photo"] ?>" height="200"
                            alt="">

                            <h4>
                                <?php echo $data["traineer_name"] ?>
                            </h4>
                            <h5>
                                <?php echo $data["coursetype_name"] ?>
                            </h5>
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
                                <a href="ViewMore.php?tid=<?php echo $data["traineer_id"] ?>">View More</a>
                            </ul>
                        </div>
                    </div>
                </div>



                <?php
                }
                ?>

            </div>
        </div>
    </div>
</body>

<?php
include ('Footer.php');
?>

</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>

function getPlace(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
            success: function (result) {
                $("#sel_place").html(result);
            }
        });
    }

    function Search() {
    var coursetype = document.getElementById('sel_coursetype').value;
    var district = document.getElementById('sel_district').value;
    var place = document.getElementById('sel_place').value;

    $.ajax({
        url: "../Assets/AjaxPages/AjaxCourseSearch.php",
        type: "GET",
        data: {
            coursetype: coursetype,
            district: district,
            place: place
        },
        success: function (result) {
            $("#result").html(result);
        }
    });
}

  
  

</script>