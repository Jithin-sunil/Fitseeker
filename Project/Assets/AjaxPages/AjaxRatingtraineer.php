<?php

//submit_rating.php
include ("../Connection/Connection.php");
session_start();
if (isset($_POST["rating_data"])) {

       $ins = "insert into  tbl_rating (user_id,rating_value,rating_comment,rating_date,traineer_id) values ('" . $_SESSION['uid'] . "','" . $_POST["rating_data"] . "','" . $_POST["user_review"] . "',NOW(),'".$_POST["traineer_id"]."')";

        if ($con->query($ins)) {
                echo "Your Review & Rating Successfully Submitted";
        } else {
                echo "Your Review & Rating Insertion Failed";
        }

}
if (isset($_POST["action"])) {

        $average_rating = 0;
        $total_review = 0;
        $five_star_review = 0;
        $four_star_review = 0;
        $three_star_review = 0;
        $two_star_review = 0;
        $one_star_review = 0;
        $total_user_rating = 0;
        $review_content = array();

        $query = "SELECT * FROM tbl_rating r inner join tbl_user c on r.user_id=c.user_id where traineer_id= ".$_POST['tid']." ORDER BY r.rating_id DESC";

        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
                $review_content[] = array(
                        'user_name' => $row["user_name"],
                        'user_review' => $row["rating_comment"],
                        'rating' => $row["rating_value"],
                        'datetime' => $row["rating_date"]
                );

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

        $average_rating = $total_user_rating / $total_review;

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

        echo json_encode($output);

}

?>