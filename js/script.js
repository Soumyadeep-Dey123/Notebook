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
