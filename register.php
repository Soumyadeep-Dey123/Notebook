<?php
include 'conn.php';
$insert = false;

if (isset($_POST['name'])) {

    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phnum = $_POST['phonenum'];
    $paswrd = $_POST['password'];

     // Check if the username or email already exists in the database
     $checkQuery = "SELECT * FROM `credentials` WHERE `name` = '$name' OR `email` = '$email'";
     $checkResult = $con->query($checkQuery);
 
     if ($checkResult->num_rows > 0) {
         // User already exists, display a message or redirect to the login page
         echo '<script>
             alert("User with the same username or email already exists. Please log in instead.");
             window.location.href = "login.php";
         </script>';
         exit;
    }

    $sql = "INSERT INTO `credentials` (`name`, `email`, `phnum`, `passwrd`) VALUES ('$name', '$email', '$phnum', '$paswrd')";
    $res = $con->query($sql);
    // echo $sql;
    if ($res == true) {
        $insert = true;
        echo "<script>alert('Your new account has been registered. Welcome to NoteBook.');</script>";
        // $rowUser = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        echo "<script> window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Technical error! Form not submit!')</script>";
    }
} else {
    // echo "ERROR: $sql <br> $con";
    // ->error ";
}

// Close the database connection $con->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>NoteBook | Register</title>
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
        <form action="register.php" method="post">
            <div class="container w3-row-padding">
                <h1 id="title">REGISTER YOURSELF</h1>

                <div class="w3-center">
                    <div class="w3-row-padding">

                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <input class="w3-input w3-border" type="text" placeholder="Name" name="name" required>
                        </div>

                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <input class="w3-input w3-border" type="email" placeholder="Email" name="email" required>
                        </div>

                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <input class="w3-input w3-border" type="number" placeholder="Phone number" name="phonenum" required>
                        </div>

                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <input class="w3-input w3-border" type="password" placeholder="Password" name="password" required>
                        </div>

                        <br>

                        <label>Already have an account? <a href="login.php">Log in.</a></label>
                    </div>
                </div>
            </div>
            <br>


            <div class="container signin">
                <div class="btn-field">
                    <button type="submit" id="signinBtn" class="disable registerbtn w3-button w3-black w3-section w3-center"><b>REGISTER</b></button>
                    <br>

                </div>
            </div>
        </form>
    </div>

    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
        <!-- <i class="fa fa-facebook-official w3-hover-opacity"></i> -->
        <a href="https://www.instagram.com/studywithnotebook/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
        <a href="https://youtube.com/@studywithnotebook" target="_blank"><i class="fa fa-youtube w3-hover-opacity"></i></a>
        <a href="https://www.linkedin.com/company/studywithnotebook/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
        <p class="w3-medium">&#169 Copyright 2023-<?= date('Y') ?> by NoteBook. All Rights Reserved. <br><a href="https://notebooklive.in/" target="_blank">NoteBook</a> is Powered by <a href=index.php#about>NoteBook Team</a></p>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </footer>

    <!-- <script src="js/script.js"></script> -->

</body>

</html>