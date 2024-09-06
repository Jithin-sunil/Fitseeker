<?php
include('../Connection/Connection.php');
?>

<div class="container">
    <div class="row" id="results">

        <?php
        $coursetype = $_GET['coursetype'] ?? '';
        $district = $_GET['district'] ?? '';
        $place = $_GET['place'] ?? '';

        $selqry = "SELECT * FROM tbl_traineer t 
                   INNER JOIN tbl_place p ON t.place_id = p.place_id 
                   INNER JOIN tbl_district d ON p.district_id = d.district_id 
                   INNER JOIN tbl_coursetype c ON t.course_id = c.coursetype_id 
                   WHERE 1 = 1";

        if ($coursetype != '') {
            $selqry .= " AND t.course_id = '$coursetype'";
        }
        if ($district != '') {
            $selqry .= " AND p.district_id = '$district'";
        }
        if ($place != '') {
            $selqry .= " AND t.place_id = '$place'";
        }

        $result = $con->query($selqry);

        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-3 col-md-6 mt-5">
                    <div class="team-member">
                        <div class="main-content">
                            <img src="../Assets/Files/Traineerdocs/<?php echo $data["traineer_photo"] ?>" height="200" alt="">
                            <h4><?php echo $data["traineer_name"] ?></h4>
                            <h5><?php echo $data["coursetype_name"] ?></h5>
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

                                $query = "SELECT * FROM tbl_rating WHERE traineer_id = '" . $data["traineer_id"] . "' ORDER BY rating_id DESC";
                                $resultRating = $con->query($query);

                                while ($row = $resultRating->fetch_assoc()) {
                                    if ($row["rating_value"] == '5') $five_star_review++;
                                    if ($row["rating_value"] == '4') $four_star_review++;
                                    if ($row["rating_value"] == '3') $three_star_review++;
                                    if ($row["rating_value"] == '2') $two_star_review++;
                                    if ($row["rating_value"] == '1') $one_star_review++;

                                    $total_review++;
                                    $total_user_rating += $row["rating_value"];
                                }

                                if ($total_review > 0 && $total_user_rating > 0) {
                                    $average_rating = $total_user_rating / $total_review;
                                }

                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<i class="fas fa-star star-light mr-1 main_star" style="color:' . ($i <= round($average_rating) ? '#FC3' : '#999') . '"></i>';
                                }
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
        } else {
            ?>
            <div class="col-12">
                <p>No trainers found matching your criteria.</p>
            </div>
            <?php
        }
        ?>

    </div>
</div>

