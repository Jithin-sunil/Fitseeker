<?php
include("Sessionvalidator.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>FitSeeker</title>
  <style>
    .BgNavbar {
      background-color: #7a6ad8 !important;
      padding: 15px;
      border-radius: 0px 0px 25px 25px;
      height: 80px !important;
      position: fixed !important;
      top: 0 !important;
      left: 0;
      right: 0;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.15) !important;
      -webkit-transition: all .5s ease 0s;
      -moz-transition: all .5s ease 0s;
      -o-transition: all .5s ease 0s;
      transition: all .5s ease 0s;
    }
  </style>
  <!-- Bootstrap core CSS -->
  <link href="../Assets/Templates/Traineer/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../Assets/Templates/Traineer/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../Assets/Templates/Traineer/assets/css/templatemo-scholar.css">
  <link rel="stylesheet" href="../Assets/Templates/Traineer/assets/css/owl.css">
  <link rel="stylesheet" href="../Assets/Templates/Traineer/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
  <!-- ***** Preloader End ***** -->
  <!-- ***** Header Area Start ***** -->
  <header class="header-area BgNavbar">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h1>FitSeeker</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Serach Start ***** -->

            <!-- ***** Serach Start ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="Homepage.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path
                      d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                  </svg></a></li>

                  <li class="scroll-to-section"><a href="Viewtraineer.php">Traineers</a></li>
                      <li class="scroll-to-section"><a href="Viewproduct.php">Product</a></li>
                      
                      <li class="scroll-to-section"><a href="Myrequest.php">Requests</a></li>
                      <li class="scroll-to-section"><a href="MyBooking.php">Bookings</a></li>
                      <li class="scroll-to-section"><a href="Viewcomplaint.php">My Complaints</a></li>
                      <li class="scroll-to-section"><a href="Myprofile.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
</svg></a></li>
<li class="scroll-to-section"><a href="MyCart.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
</svg></a></li>

                      <li class="scroll-to-section"><a href="Logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  <div align="center">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>