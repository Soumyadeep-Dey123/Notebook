<?php
include 'conn.php';
// if(!isset($_SESSION['name'])){
//   header("Location: login.php");
// }
$insert = false;

if (isset($_POST['name'])) {

  // echo "Success connecting to the db";

  // Collect post variables
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `date`) VALUES ('$name', '$email', '$message', current_timestamp())";
  // echo $sql;

  // Execute the query
  if ($con->query($sql) == true) {
    include 'email.php';

    if ($mailToAdmin) {
      echo "<script>alert('Thanks for contacting NoteBook. If your message contained a query, our team will contact you back within 24 working hours.')</script>";
    } else {
      echo "<script>alert('Technical error! Form not submit!')</script>";
    }
  } else {
    echo "ERROR: $sql <br> $con";
    // ->error ";
  }

  // Close the database connection $con->close();
}

$sqlSubject = "SELECT * FROM `subjects`";
$resSubject = mysqli_query($con, $sqlSubject);
$videoResSubject = mysqli_query($con, $sqlSubject);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>NoteBook</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images\favicon.ico">
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
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
      <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT US</a>
      <a href="#materials" class="w3-bar-item w3-button w3-padding-large w3-hide-small">NOTES/VIDEOS</a>
      <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT US</a>
      <?php if (isset($_SESSION['name'])) { ?>
        <a href="my_profile.php" id="user-details" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MY PROFILE</a>
        <a href="my_profile.php" id="user-details" class="w3-bar-item w3-button w3-padding-large w3-hide-small" style="float:right">Hi! <?php echo $_SESSION['name']; ?></a>
      <?php } else { ?>
        <a href="login.php" id="login" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGIN/REGISTER</a>
      <?php } ?>
      <!-- <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="#" class="w3-bar-item w3-button">Merchandise</a>
        <a href="#" class="w3-bar-item w3-button">Extras</a>
        <a href="#" class="w3-bar-item w3-button">Media</a>
      </div>
    </div> -->
      <!-- <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i
          class="fa fa-search"></i></a> -->
    </div>
  </div>

  <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
  <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">About Us</a>
    <a href="#materials" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Notes/Videos</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Contact Us</a>
    <?php if (isset($_SESSION['name'])) { ?>
      <a href="my_profile.php" id="user-details" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">My Profile</a>
      <a href="my_profile.php" id="login" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()" style="float:right">Hi! <?php echo $_SESSION['name']; ?></a>
    <?php } else { ?>
      <a href="login.php" id="login" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Login/Register</a>
    <?php } ?>
    <!-- <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MERCH</a> -->
  </div>

  <!-- Page content -->
  <div class="w3-content" style="max-width:2000px;margin-top:46px">

    <!-- Automatic Slideshow Images -->
    <div class="mySlides w3-display-container w3-center">
      <img src="images\Template1.png" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <!-- <h3>Los Angeles</h3>
      <p><b>We had the best time playing at Venice Beach!</b></p>    -->
      </div>
    </div>
    <div class="mySlides w3-display-container w3-center">
      <img src="images\Template2.png" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <!-- <h3>New York</h3>
      <p><b>The atmosphere in New York is lorem ipsum.</b></p>     -->
      </div>
    </div>
    <div class="mySlides w3-display-container w3-center">
      <img src="images\Template3.png" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <!-- <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>     -->
      </div>
    </div>

    <div class="mySlides w3-display-container w3-center">
      <img src="images\Template4.png" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <!-- <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>     -->
      </div>
    </div>

    <!-- The Band Section -->
    <div class="w3-container w3-content w3-center w3-padding-64 " style="max-width:800px" id="about">
      <h2 class="w3-wide">ABOUT US</h2>
      <!-- <p class="w3-opacity"><i>We love music</i></p> -->
      <p class="w3-justify">NoteBook is an innovative educational platform designed to revolutionize learning.
        With its user-friendly interface and comprehensive features, NoteBook empowers students to take organized digital notes,
        access study materials, and engage in quality content through our YouTube . Its seamless integration of technology
        enhances educational experiences and promotes academic success.
      </p>
      <div class="w3-row w3-padding-32">
        <h3 class="w3-wide">FACULTY MEMBERS</h3>
        <div class="w3-third">
          <img src="images\DebarghaPic.PNG" class="w3-round " alt="Random Name" style="width:60%">
          <p>Debargha Chakraborty<br>Maths Faculty</p>
        </div>
        <div class="w3-third">
          <img src="images\rudrashisFinal.PNG" class="w3-round " alt="Random Name" style="width:60%">
          <p>Rudrasish Dutta<br>Chemistry & Physics Faculty</p>
        </div>
        <div class="w3-third">
          <img src="images\tanibio.PNG" class="w3-round" alt="Random Name" style="width:60%">
          <p>Tanisha Halder<br>Biology Faculty</p>
        </div>
      </div>
      <div class="w3-third">
        <img src="images\srinjoyrembg.PNG" class="w3-round " alt="Random Name" style="width:60%">
        <p>Srinjoy Pramanik<br>Computer Faculty</p>
      </div>
      <div class="w3-third">
        <img src="images\sagnikcomp.PNG" class="w3-round " alt="Random Name" style="width:60%">
        <p>Sagnik Pal<br>Computer Faculty</p>
      </div>
      <div class="w3-third">
        <img src="images\ayaneng.PNG" class="w3-round" alt="Random Name" style="width:60%">
        <p>Ayanangshu Maity<br>English Faculty</p>
      </div>
    </div>
  </div>

  <!-- The Tour Section -->
  <div class="w3-black" id="materials">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">STUDY MATERIALS</h2>
      <!-- <p class="w3-opacity w3-center"><i>Remember to book your tickets!</i></p><br> -->

      <!-- <ul class="w3-ul w3-border w3-white w3-text-grey">
        <li class="w3-padding">September <span class="w3-tag w3-red w3-margin-left">Sold out</span></li>
        <li class="w3-padding">October <span class="w3-tag w3-red w3-margin-left">Sold out</span></li>
        <li class="w3-padding">November <span class="w3-badge w3-right w3-margin-right">3</span></li>
      </ul> -->

      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
        <div class="w3-third w3-margin-bottom">
          <img src="images\notesicon.jpg" alt="New York" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>NOTES</b></p>
            <!-- <p class="w3-opacity">Fri 27 Nov 2016</p> -->
            <p>Comprising of one of the finest notes (handwritten and typed) for ICSE class X.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">View Notes</button>
          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <!-- <img src="/w3images/paris.jpg" alt="Paris" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Paris</b></p>
            <p class="w3-opacity">Sat 28 Nov 2016</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
          </div> -->
        </div>
        <div class="w3-third w3-margin-bottom">
          <a href="https://www.youtube.com/@studywithnotebook" target="_blank"><img src="images\videoicon.jpg" alt="San Francisco" style="width:100%" class="w3-hover-opacity" /></a>
          <div class="w3-container w3-white">
            <p><b>VIDEOS</b></p>
            <!-- <p class="w3-opacity">Sun 29 Nov 2016</p> -->
            <p>Comprising of one of the finest video lectures (published on our youtube channel) for ICSE class X.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('redirectingyt').style.display='block'">Watch Videos</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Notes Ticket Modal -->
  <div id="ticketModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-table-all w3-card-4">
      <header class="w3-container w3-center w3-black w3-padding-32">
        <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-white w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class=" w3-margin-right"></i>Notes</h2>
      </header>
      <div class="w3-container">
        <form action="display.php" method="POST">
          <!-- <p><label><i class="fa fa-user"></i>Enter Your Name</label></p>
          <input class="w3-input w3-border" type="text" placeholder="Name:"> -->
          <p><label><i class="fa fa-book"></i>Select your subject</label></p>
          <!-- <input class="w3-input w3-border" type="text" placeholder="Enter email"> -->
          <select id="subject_id" name="subject_id" class="fa fa-user w3-input w3-border">
            <option value="">---Select Subject---</option>
            <?php
            while ($rowSubject = mysqli_fetch_array($resSubject, MYSQLI_ASSOC)) {
              echo '<option value="' . $rowSubject['id'] . '">' . $rowSubject['subjectname'] . '</option>';
            }
            ?>
          </select>
          <div id="sec-chapter" style="display:none;">
            <p><label><i class="fa fa-bookmark"></i>Select Chapter</label></p>
            <select id="chapter_id" name="chapter_id" class="fa fa-user w3-input w3-border"></select>
          </div>

          <div style="clear:both;"></div>
          <!-- <div id="notes-area" style="margin-top:10px;">
            <embed id="notes" src="" width="800px" height="500px" />
          </div> -->

          <a id="new-link" href="" target="_blank" class="w3-button w3-block w3-black w3-padding-16 w3-section w3-right">Open Notes<i class="fa fa-check"></i></a>
        </form>

        <!-- <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i              class="fa fa-remove"></i></button> -->
        <!-- <p class="w3-right">Need <a href="#contact" class="w3-text-blue">help?</a></p> -->

      </div>
    </div>
  </div>

  <!-- Redirecting to youtube -->
  <div id="redirectingyt" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-table-all w3-card-4">
      <header class="w3-container w3-black w3-center w3-padding-32">
        <span onclick="document.getElementById('redirectingyt').style.display='none'" class="w3-button w3-white w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="w3-margin-right"></i>Videos</h2>
      </header>
      <div class="w3-container">
        <form action="display.php" method="POST">
          <!-- <p><label><i class="fa fa-user"></i>Enter Your Name</label></p>
          <input class="w3-input w3-border" type="text" placeholder="Name:"> -->
          <p><label><i class="fa fa-book"></i>Select your subject</label></p>
          <!-- <input class="w3-input w3-border" type="text" placeholder="Enter email"> -->
          <select id="video_subject_id" name="video_subject_id" class="fa fa-user w3-input w3-border">
            <option value="">---Select Subject---</option>
            <?php
            while ($videoRowSubject = mysqli_fetch_array($videoResSubject, MYSQLI_ASSOC)) {
              echo '<option value="' . $videoRowSubject['id'] . '">' . $videoRowSubject['subjectname'] . '</option>';
            }
            ?>
          </select>
          <div id="video-sec-chapter" style="display:none;">
            <p><label><i class="fa fa-bookmark"></i>Select Chapter</label></p>
            <select id="video_chapter_id" name="video_chapter_id" class="fa fa-user w3-input w3-border"></select>
          </div>

          <div style="clear:both;"></div>
          <!-- <div id="video-area" style="margin-top:10px;">
            <iframe id="y-video" width="800px" height="500px" src=""></iframe>
          </div> -->

          <a id="you-link" href="" target="_blank" class="w3-button w3-block w3-black w3-padding-16 w3-section w3-right">View Lecture<i class="fa fa-check"></i></a>
        </form>

        <!-- <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i              class="fa fa-remove"></i></button> -->
        <!-- <p class="w3-right">Need <a href="#contact" class="w3-text-blue">help?</a></p> -->

      </div>
    </div>
  </div>
  <?php
  if ($insert == true) {
    echo "<p class='submitMsg'>Thanks for submitting your form. </p>";
  }
  ?>
  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Connect with us</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Kolkata, India<br>
        <!-- <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515<br> -->
        <i class="fa fa-envelope" style="width:30px"> </i> Email: contact@notebooklive.in<br>
      </div>
      <div class="w3-col m6">
        <form action="index.php" method="POST">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="email" placeholder="Email" required name="email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="message">
          <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>

  <!-- End Page Content -->
  </div>

  <!-- Image of location/map -->
  <!-- <img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%"> -->

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
    <!-- <i class="fa fa-facebook-official w3-hover-opacity"></i> -->
    <!-- <i class="fa fa-snapchat w3-hover-opacity"></i> -->
    <!-- <i class="fa fa-pinterest-p w3-hover-opacity"></i> -->
    <!-- <i class="fa fa-twitter w3-hover-opacity"></i> -->
    <a href="https://www.instagram.com/studywithnotebook/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="https://youtube.com/@studywithnotebook" target="_blank"><i class="fa fa-youtube w3-hover-opacity"></i></a>
    <a href="https://www.linkedin.com/company/studywithnotebook/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <p class="w3-medium">&#169 Copyright 2023-<?= date('Y') ?> by NoteBook. All Rights Reserved. <br><a href="https://notebooklive.in/" target="_blank">NoteBook</a> is Powered by <a href=#about>NoteBook Team</a></p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </footer>

  <script>
    $(document).ready(function() {
      $("#notes-area").hide();
      $("#video-area").hide();

      $("#subject_id").change(function() {
        $("#notes-area").hide();
        var subject_id = $(this).val();
        if (subject_id != "") {
          $.post("get_chapters.php", {
              subject_id: subject_id
            },
            function(data, status) {
              if (data.length > 0) {
                $("#chapter_id").html(data);
                // $('embed#notes').attr('src', 'notes/computer/Computer_1_Unit_1_Introduction_to_Object_Oriented_Programming_Concepts.pdf');
                $("#sec-chapter").show();
              } else {
                $("#chapter_id").html(alert('Coming Soon!'));
                $("#sec-chapter").hide();
              }
            });
        } else {
          $("#chapter_id").html('');
          $("#sec-chapter").hide();
        }
      });

      /****************************************************************** */
      $("#chapter_id").change(function() {
        var chapter_id = $(this).val();
        if (chapter_id != "") {
          $.post("get_notes.php", {
              chapter_id: chapter_id
            },
            function(data, status) {
              if (<?php isset($_SESSION['name']) ?>) {
                if (data.length > 0) {
                  $('embed#notes').attr('src', 'notes/' + data);
                  $('#new-link').attr('href', 'notes/' + data);
                  //$("#notes-area").show();
                } else {
                  //$('embed#notes').attr('src', '');
                  //$('#new-link').attr('href', '');
                  alert("Lecture Uploaded on Youtube. Please Checkout the video section for the link.");
                  //$("#notes-area").hide();
                }
              } else {
                alert("Please login to view the notes");
                $("#notes-area").attr('href',"login.php");
                
                // document.getElementById("#new-link").textContent = "Login to view notes";

              }
            });
        } else {
          $('embed#notes').attr('src', '');
          $('#new-link').attr('href', '');
          //$("#notes-area").hide();
        }
      });


      /********************************************************Video Section***************************************************************/
      $("#video_subject_id").change(function() {
        $("#video-area").hide();
        var subject_id = $(this).val();
        if (subject_id != "") {
          $.post("get_chapters.php", {
              subject_id: subject_id
            },
            function(data, status) {
              if (data.length > 0) {
                $("#video_chapter_id").html(data);
                // $('embed#notes').attr('src', 'notes/computer/Computer_1_Unit_1_Introduction_to_Object_Oriented_Programming_Concepts.pdf');
                $("#video-sec-chapter").show();
              } else {
                $("#video_chapter_id").html(alert('Coming Soon!'));
                $("#video-sec-chapter").hide();
              }
            });
        } else {
          $("#video_chapter_id").html('');
          $("#video-sec-chapter").hide();
        }
      });

      /****************************************************************** */
      $("#video_chapter_id").change(function() {
        var chapter_id = $(this).val();
        if (chapter_id != "") {
          $.post("get_videos.php", {
              chapter_id: chapter_id
            },
            function(data, status) {
              if (data.length > 0) {
                $('#y-video').attr('src', data);
                $('#you-link').attr('href', data);
                //$("#video-area").show();
              } else {
                $('#y-video').attr('src', '');
                $('#you-link').attr('href', '');
                // $("#video-area").hide();
              }
            });
        } else {
          $('#y-video').attr('src', '');
          $('#you-link').attr('href', '');
          //$("#video-area").hide();
        }
      });



    });




    // Automatic Slideshow - change image every 4 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 7000);
    }

    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }

    // When the user clicks anywhere outside of the modal, close it
    var modal = document.getElementById('ticketModal');
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>

</html>
<?php
$con->close();
?>