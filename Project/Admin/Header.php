<?php
include ('../Assets/Connection/Connection.php');
include("Sessionvalidator.php");




$selQry = "select * from tbl_admin where admin_id='" . $_SESSION['aid'] . "'";
$res = $con->query($selQry);
$data = $res->fetch_assoc();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assets/Templates/Admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/Templates/Admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Templates/Admin/css/style.css" rel="stylesheet">


    
</head>

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
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Fitseeker</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../Assets/Templates/Admin/img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"></h6>
                        
                        <span><?php echo $data['admin_name'] ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="Home.php" class="nav-item nav-link active"><i
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
                    <a href="District.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>District</a>
                    <a href="Place.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Place</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Brand.php" class="dropdown-item">Add Brands</a>
                            <a href="Category.php" class="dropdown-item">Add Category</a>
                            <a href="Subcategory.php" class="dropdown-item">Add Subcategory</a>
                        </div>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Course</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Coursetype.php" class="dropdown-item">Coursetype</a>
                            
                        </div>
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
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <!-- <input class="form-control bg-dark border-0" type="search" placeholder="Search"> -->
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../Assets/Templates/Admin/img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <!-- <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small> -->
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../Assets/Templates/Admin/img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <!-- <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small> -->
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../Assets/Templates/Admin/img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
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
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <!-- <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a> -->
                            <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>  -->
                            <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a> -->
                            <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a> -->
                        </div>
                    </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="../Assets/Templates/Admin/img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex"><?php echo $data['admin_name'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <!-- <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a> -->
                        <a href="Logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
        
        </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div align="center">
