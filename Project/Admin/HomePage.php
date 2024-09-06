<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <th colspan="2" scope="col">Welcome</th>
  </tr>
  <tr>
    <td colspan="2"><a href="../Guest/Adminregisration.php">Adminregisration</a></td>
  </tr>
  <tr>
    <td colspan="2"><a href="District.php">District</a></td>
  </tr>
    <tr>
    <td colspan="2"><a href="Place.php">Place</a></td>
  </tr>
  <tr>
    <td colspan="2"><a href="Category.php">Category</a></td>
  </tr>
    <tr>
    <td colspan="2"><a href="Subcategory.php">Subcategory</a></td>
  </tr>
  
  <tr>
    <td colspan="2"><a href="Viewuser.php">Viewuser</a></td>
  </tr>
   <tr>
    <td colspan="2"><a href="Viewseller.php">Viewseller</a></td>
  </tr>
   <tr>
    <td colspan="2"><a href="Viewtraineer.php">Viewtraineer</a></td>
  </tr>
   <tr>
    <td colspan="2"><a href="Acceptedtrainers.php">Acceptedtrainers</a></td>
  </tr>
   <tr>
    <td colspan="2"><a href="Rejecttraineers.php">Rejecttraineers</a></td>
  </tr>
  </tr>  <td colspan="2"><a href="Acceptseller.php">Acceptseller</a></td>

   <tr>
    <td colspan="2"><a href="Rejectseller.php">Rejectseller</a></td>
  </tr>
  
   <tr>
    <td colspan="2"><a href="Brand.php">Brand</a></td>
  </tr>
  
   <tr>
    <td colspan="2"><a href="Coursetype.php">Coursetype</a></td>
  </tr>
  
  
</table>
</body>
</html> -->

<?php
include ('../Assets/Connection/Connection.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fitseeker</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../Assets/Templates/Admindashboard/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assets/Templates/Admindashboard/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Admindashboard/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/Templates/Admindashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Templates/Admindashboard/css/style.css" rel="stylesheet">


    <style>
        body {
            background-color: #121212;
            /* Dark background */
            color: #e0e0e0;
            /* Light text color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #1e1e1e;
            /* Darker table background */
        }

        th,
        td {
            border: 1px solid #333;
            /* Lighter border color */
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            /* Darker header background */
            color: #ffffff;
            /* Light text color for headers */
        }

        td {
            background-color: #2c2c2c;
            /* Dark row background */
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }

        a {
            color: #bb86fc;
            /* Light purple color for links */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .section {
            margin-bottom: 40px;
            padding: 20px;
            border-radius: 8px;
            background-color: #1e1e1e;
            /* Section background */
        }

        .section h2 {
            margin-bottom: 10px;
            color: #e0e0e0;
            /* Light text color for headers */
        }

        form {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>FItseeker</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../Assets/Templates/Admindashboard/img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"></h6>
                        <?php
                        $selQry = "select * from tbl_admin where admin_id='" . $_SESSION['aid'] . "'";
                        $res = $con->query($selQry);
                        $data = $res->fetch_assoc();

                        ?>
                        <span><?php echo $data['admin_name'] ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="HomePage.php" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Traineers</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Viewtraineer.php" class="dropdown-item">New Traineers</a>
                            <a href="Acceptedtrainers.php" class="dropdown-item">Accepted Traineers</a>
                            <a href="Rejecttraineers.php" class="dropdown-item">Rejected Traineers</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Seller</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Viewseller.php" class="dropdown-item">New Seller</a>
                            <a href="Acceptseller.php" class="dropdown-item">Accepted Seller</a>
                            <a href="Rejectseller.php" class="dropdown-item">Rejected Seller</a>
                        </div>
                    </div>
                    <a href="Viewuser.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Users</a>
                    <a href="Coursetype.php" class="nav-item nav-link"><i
                            class="fa fa-chart-bar me-2"></i>Coursetype</a>
                    <a href="District.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>District</a>
                    <a href="Place.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Place</a>
                    <a href="Brand.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Brand</a>
                    <a href="Category.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Category</a>
                    <a href="Subcategory.php" class="nav-item nav-link"><i
                            class="fa fa-chart-bar me-2"></i>Subcategory</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Adminregisration.php" class="dropdown-item">Login a new Admin</a>
                            <a href="Logout.php" class="dropdown-item">Logout</a>
                            <a href="Myprofile.php" class="dropdown-item">Show all admins</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="min-height: 9vh;
    background: var(--dark);
    transition: 0.5s;">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form><br><br>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../Assets/Templates/Admindashboard/img/user.jpg"
                                        alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../Assets/Templates/Admindashboard/img/user.jpg"
                                        alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../Assets/Templates/Admindashboard/img/user.jpg"
                                        alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../Assets/Templates/Admindashboard/img/user.jpg"
                                alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $data['admin_name'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="../Guest/Login.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->




            



            


            <!-- Sellers Section -->
            <div class="section">
                <h2>Sellers</h2>
                <table>
                    <tr>
                        <th>SlNO</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Date of Join</th>
                        <th>Address</th>
                        <th>Place</th>
                        <th>District</th>
                        <th>Image</th>
                        <th>Proof</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $selqurey = "SELECT * FROM tbl_seller u 
                       INNER JOIN tbl_place p ON u.place_id = p.place_id  
                       INNER JOIN tbl_district d ON p.district_id=d.district_id 
                       INNER JOIN tbl_category s ON u.category_id=s.category_id 
                       WHERE seller_status='0'";
                    $result = $con->query($selqurey);
                    $i = 0;
                    while ($data = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $data["seller_name"] ?></td>
                            <td><?php echo $data["seller_companyname"] ?></td>
                            <td><?php echo $data["seller_email"] ?></td>
                            <td><?php echo $data["seller_contact"] ?></td>
                            <td><?php echo $data["seller_doj"] ?></td>
                            <td><?php echo $data["seller_address"] ?></td>
                            <td><?php echo $data["place_name"] ?></td>
                            <td><?php echo $data["district_name"] ?></td>
                            <td><img src="../Assets/Files/Sellerdocs/<?php echo $data["seller_image"] ?>"
                                    alt="Seller Image" /></td>
                            <td><img src="../Assets/Files/Sellerdocs/<?php echo $data["seller_proof"] ?>"
                                    alt="Seller Proof" /></td>
                            <td><?php echo $data["category_name"] ?></td>
                            <td>
                                <a href="Viewseller.php?acpID=<?php echo $data["seller_id"] ?>">ACCEPT</a> &nbsp; &nbsp;
                                <a href="Viewseller.php?rejID=<?php echo $data["seller_id"] ?>">REJECT</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

            <!-- Trainees Section -->
            <div class="section">
                <h2>Trainees</h2>
                <table>
                    <tr>
                        <th>SlNO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Place</th>
                        <th>District</th>
                        <th>Image</th>
                        <th>Proof</th>
                        <th>Course</th>
                        <th>Course Type</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $selqurey = "SELECT * FROM tbl_traineer u 
                       INNER JOIN tbl_place p ON u.place_id = p.place_id  
                       INNER JOIN tbl_district d ON p.district_id=d.district_id 
                       INNER JOIN tbl_coursetype z ON u.course_id=z.coursetype_id 
                       WHERE traineer_status='0'";
                    $result = $con->query($selqurey);
                    $i = 0;
                    while ($data = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $data["traineer_name"] ?></td>
                            <td><?php echo $data["traineer_email"] ?></td>
                            <td><?php echo $data["traineer_contact"] ?></td>
                            <td><?php echo $data["traineer_dob"] ?></td>
                            <td><?php echo $data["traineer_address"] ?></td>
                            <td><?php echo $data["place_name"] ?></td>
                            <td><?php echo $data["district_name"] ?></td>
                            <td><img src="../Assets/Files/Traineerdocs/Image/<?php echo $data["traineer_photo"] ?>"
                                    alt="Trainee Photo" /></td>
                            <td><img src="../Assets/Files/Traineerdocs/Proof/<?php echo $data["traineer_proof"] ?>"
                                    alt="Trainee Proof" /></td>
                            <td><?php echo $data["traineer_course"] ?></td>
                            <td><?php echo $data["coursetype_name"] ?></td>
                            <td><img src="../Assets/Files/Traineerdocs/Qualification/<?php echo $data["traineer_qualification"] ?>"
                                    alt="Qualification" /></td>
                            <td><?php echo $data["traineer_experience"] ?></td>
                            <td>
                                <a href="Viewtraineer.php?acpID=<?php echo $data["traineer_id"] ?>">ACCEPT</a> &nbsp; &nbsp;
                                <a href="Viewtraineer.php?rejID=<?php echo $data["traineer_id"] ?>">REJECT</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

            <!-- Users Section -->
            <div class="section">
                <h2>Users</h2>
                <form id="form1" name="form1" method="post" action="">
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>District</th>
                            <th>Place</th>
                            <th>Photo</th>
                            <th>Proof</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $selqurey = "SELECT * FROM tbl_user u 
                           INNER JOIN tbl_place p ON u.place_id = p.place_id  
                           INNER JOIN tbl_district d ON p.district_id=d.district_id";
                        $result = $con->query($selqurey);
                        $i = 0;
                        while ($data = $result->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $data["user_name"] ?></td>
                                <td><?php echo $data["user_email"] ?></td>
                                <td><?php echo $data["user_contact"] ?></td>
                                <td><?php echo $data["district_name"] ?></td>
                                <td><?php echo $data["place_name"] ?></td>
                                <td><img src="../Assets/Files/Userdocs/<?php echo $data["user_photo"] ?>"
                                        alt="User Photo" /></td>
                                <td><img src="../Assets/Files/Userdocs/<?php echo $data["user_proof"] ?>"
                                        alt="User Proof" /></td>
                                <td>
                                    <a href="Viewuser.php?delID=<?php echo $data["user_id"] ?>">DELETE</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </form>
            </div>

        </div>



        <!-- ends -->




        <!-- Sale & Revenue Start -->
        <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- Sale & Revenue End -->


        <!-- Sales Chart Start -->
        <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- Sales Chart End -->


        <!-- Recent Sales Start -->
        <!-- <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            Recent Sales End -->


        <!-- Widgets Start -->
        <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="../Assets/Templates/Admindashboard/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="../Assets/Templates/Admindashboard/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="../Assets/Templates/Admindashboard/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="../Assets/Templates/Admindashboard/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-dark border-0" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox" checked>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><del>Short task goes here...</del></span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- Widgets End -->


        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded-top p-4">
                <div class="row">
                    <!-- <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div> -->
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Templates/Admindashboard/lib/chart/chart.min.js"></script>
    <script src="../Assets/Templates/Admindashboard/lib/easing/easing.min.js"></script>
    <script src="../Assets/Templates/Admindashboard/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Templates/Admindashboard/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Assets/Templates/Admindashboard/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../Assets/Templates/Admindashboard/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../Assets/Templates/Admindashboard/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Assets/Templates/Admindashboard/js/main.js"></script>
</body>

</html>