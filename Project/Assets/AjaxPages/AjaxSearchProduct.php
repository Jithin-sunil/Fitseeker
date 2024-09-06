<?php
include ("../Connection/Connection.php");


if (isset($_GET["action"])) {

    $sqlQry = "SELECT * from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id  inner join tbl_seller k on k.seller_id=p.seller_id where true ";

    if ($_GET["category"] != null) {

        $category = $_GET["category"];

        $sqlQry = $sqlQry . " AND c.category_id IN(" . $category . ")";
    }
    if ($_GET["subcategory"] != null) {

        $subcategory = $_GET["subcategory"];

        $sqlQry = $sqlQry . " AND sc.subcategory_id IN(" . $subcategory . ")";
    }

    if ($_GET["name"] != null) {

        $name = $_GET["name"];

        $sqlQry = $sqlQry . " AND subcategory_name LIKE '" . $name . "%'";
    }
    $resultS = $con->query($sqlQry);



    if ($resultS->num_rows > 0) {
        while ($rowS = $resultS->fetch_assoc()) {
            ?>

            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                    <div class="thumb">
                                <a href="#"><img src="../Assets/Files/Product/<?php echo $rowS["product_image"] ?>" alt=""
                                        height="300"></a>
                                <span class="category" style="background-color:black !important;"
                                    onclick="addCart(<?php echo $rowS["product_id"] ?>)"><svg
                                        xmlns="http://www.w3.org/2000/svg" style="color:white" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                                    </svg></span>
                                
                            </div>
                        <div class="card-img-secondary">
                            <h6 class="text-light bg-info text-center rounded p-1"><?php echo $rowS["product_name"]; ?></h6>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-danger" align="center">
                                Price : <?php echo $rowS["product_price"]; ?>/-
                            </h4>
                            <p align="center">
                                <?php echo $rowS["category_name"]; ?><br>
                                <?php echo $rowS["subcategory_name"]; ?><br>
                            </p>
                            <?php


                            $average_rating = 0;
                            $total_rating = 0;
                            $five_star_rating = 0;
                            $four_star_rating = 0;
                            $three_star_rating = 0;
                            $two_star_rating = 0;
                            $one_star_rating = 0;
                            $total_user_rating = 0;
                            $rating_content = array();

                            $query = "SELECT * FROM tbl_rating where product_id = '" . $rowS["product_id"] . "' ORDER BY rating_id DESC";

                            $result = $con->query($query);

                            while ($row = $result->fetch_assoc()) {


                                if ($row["user_rating"] == '5') {
                                    $five_star_review++;
                                }

                                if ($row["user_rating"] == '4') {
                                    $four_star_review++;
                                }

                                if ($row["user_rating"] == '3') {
                                    $three_star_review++;
                                }

                                if ($row["user_rating"] == '2') {
                                    $two_star_review++;
                                }

                                if ($row["user_rating"] == '1') {
                                    $one_star_review++;
                                }

                                $total_review++;

                                $total_user_rating = $total_user_rating + $row["user_rating"];

                            }


                            if ($total_rating == 0 || $total_user_rating == 0) {
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
                                'total_rating' => $total_rating,
                                'five_star_rating' => $five_star_rating,
                                'four_star_rating' => $four_star_rating,
                                'three_star_rating' => $three_star_rating,
                                'two_star_rating' => $two_star_rating,
                                'one_star_rating' => $one_star_rating,
                                'rating_data' => $rating_content
                            );

                            ?>


                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    } else {
        echo "<h4 align='center'>Products Not Found!!!!</h4>";
    }
}

?>