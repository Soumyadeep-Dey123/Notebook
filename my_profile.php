<?php
include 'conn.php';
if (!isset($_SESSION['name'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>NoteBook | My Profile</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images\favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      font-family: Ubuntu
    }

    .mySlides {
      display: none
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-black w3-card">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-padding-large">RETURN TO HOME PAGE</a>

    </div>
  </div>

  <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Return to Home Page</a>
  </div>

  <div class="w3-container w3-content w3-padding-64 w3-center ">
    <div class="container w3-row-padding w3-large w3-margin-bottom ">
      <h1 id="title">MY DETAILS</h1>
      <!-- <div class="w3-col m6 w3-large w3-margin-bottom"> -->
          Name : <?php print($_SESSION['name'])?><br>
          <!-- <i class="fa fa-phone" ></i> Phone: +00 151515<br> -->
          Email: <?php print($_SESSION['email'])?><br>
          Phone Number: <?php print($_SESSION['phonenum'])?><br>
        <!-- </div> -->
      </div>
      <a href="logout.php"><button type="button" id="signinBtn" class="disable registerbtn w3-button w3-black w3-section w3-center"><b>SIGN OUT</b></button></a>
  </div>


      <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
        <!-- <i class="fa fa-facebook-official w3-hover-opacity"></i> -->
        <!-- <i class="fa fa-snapchat w3-hover-opacity"></i> -->
        <!-- <i class="fa fa-pinterest-p w3-hover-opacity"></i> -->
        <!-- <i class="fa fa-twitter w3-hover-opacity"></i> -->
        <a href="https://www.instagram.com/studywithnotebook/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
        <a href="https://youtube.com/@studywithnotebook" target="_blank"><i class="fa fa-youtube w3-hover-opacity"></i></a>
        <a href="https://www.linkedin.com/company/studywithnotebook/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
        <p class="w3-medium">&#169 Copyright 2023-<?= date('Y') ?> by NoteBook. All Rights Reserved. <br><a href="https://notebooklive.in/" target="_blank">NoteBook</a> is Powered by <a href=index.php#about>NoteBook Team</a></p>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      </footer>

</body>

</html>