<?php
include ('../Assets/Connection/Connection.php');
include ('Header.php');
?>


<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FitSeeker::View Product</title>
    <style>
        .custom-alert-box {
            z-index: 1;
            width: 20%;
            height: 10%;
            position: fixed;
            bottom: 0;
            right: 0;
            left: auto;
        }

        .success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            display: none;
        }

        .failure {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            display: none;
        }

        .warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
            display: none;
        }
        .events_item .thumb span.price {
    position: absolute;
    right: -10px;
    top: -57px;
    background-color: rgba(122, 106, 216, 0.95);
    width: 136px;
    height: 130px;
    border-radius: 50%;
    display: inline-block;
    transition: all .3s;
}
    </style>
</head>

<body>

<table align="right">
<tr>
        <td>
        <a href="SearchProduct.php">Filter <i class="fa-solid fa-angle-down"></i></a>&nbsp;&nbsp;
      </tr>
</table>


    <div class="custom-alert-box">
        <div class="alert-box success">Successful Added to Cart !!!</div>
        <div class="alert-box failure">Failed to Add Cart !!!</div>
        <div class="alert-box warning">Already Added to Cart !!!</div>
    </div>

    <section class="section courses" id="courses">
        <div class="container"  id="result">
            <div class="row" >
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                    </div>
                </div>
            </div>

            <div class="row event_box">
                <?php
                $selqurey = "select * from tbl_product s inner join tbl_subcategory c on s.subcategory_id = c.subcategory_id inner join tbl_category d on c.category_id=d.category_id";
                $result = $con->query($selqurey);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                    $i++;
                    ?>

                    <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design" >
                        <div class="events_item" >
                            <div class="thumb">
                                <a href="#"><img src="../Assets/Files/Product/<?php echo $data["product_image"] ?>" alt=""
                                        height="300"></a>
                                <span class="category" style="background-color:black !important;"
                                    onclick="addCart(<?php echo $data["product_id"] ?>)"><svg
                                        xmlns="http://www.w3.org/2000/svg" style="color:white" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                                    </svg></span>
                                <span class="price">
                                    <h6><em> ₹</em><?php echo $data["product_price"] ?></h6>
                                </span>
                            </div>
                            <div class="down-content">
                                <span
                                    class="author"><?php echo $data["subcategory_name"] ?>,<?php echo $data["category_name"] ?></span>
                                <h4><?php echo $data["product_name"] ?></h4>
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

                                    $query = "SELECT * FROM tbl_rating where product_id = '" . $data["product_id"] . "' ORDER BY rating_id DESC";

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
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

</body>
<script src="../Assets/JQ/jQuery.js"></script>

<script>
    function addCart(id) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
            success: function (response) {
                if (response.trim() === "Added to Cart") {
                    $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                }
                else if (response.trim() === "Already Added to Cart") {
                    $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                }
                else {
                    $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                }
            }
        });
    }


  function getSubcategory(did) {
    $.ajax({
      url: "../Assets/AjaxPages/Ajaxsubcategory.php?did=" + did,
      success: function (result) {

        $("#sel_subcategory").html(result);
      }
    });
  }

  function SearchProduct(pid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSearchProduct.php?pid=" + pid,
      success: function (result) {

        $("#result").html(result);
      }
    });
  }


</script>

<?php
include('Footer.php');
?>