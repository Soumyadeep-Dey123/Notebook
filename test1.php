<?
include 'conn.php';
//  class all_functions {
    // function get_chapters($subject_id, $con){
    //     if (isset($_POST['subject_id'])) {
    //         // Set connection variables
            
    //         $subject = $_POST['subject_id'];
    //         $sql ="SELECT `id`,`chaptername` FROM `chapters` WHERE `subjectid` = ".$subject;
        
    //         $res = mysqli_query($con, $sql);
        
    //         $rowcount=mysqli_num_rows($res);
    //         $chaptersList = "";
    //         if($rowcount > 0){
    //             $chaptersList .= '<option>--Select Chapter---</option>';
            
                // while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
    //                 $chaptersList .= '<option value="'.$row['id'].'">'.$row['chaptername'].'</option>';
    //             } 
            
    //         }
    //         echo $chaptersList;
            
        
    //     }
    // }
    function get_notes(){}
    function contact_form($name, $email, $message, $con){
        if (isset($name)) {

            // echo "Success connecting to the db";
          
            // Collect post variables
            $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `date`) VALUES ('$name', '$email', '$message', current_timestamp())";
            // echo $sql;
          
            // Execute the query
            if ($con->query($sql) == true) {
              // $func_email = new all_functions();
              $emailRes = email($name, $email, $message);          
              if ($emailRes == true) {
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
    }
    function email($name, $email, $message){
        try{
    
            $to = "contact@notebooklive.in";
            $subject = "Notebook::Contact Us Mail";
            $message = "<html><body><p>Hello Admin,</p><p>You have mail from ".$name."</p><table><tr><th>Name</th><td>".$name."</td></tr><tr><th>Email</th><td>".$email."</td></tr><tr><th>Message</th><td>".$message."</td></tr></table></body></html>";
            
            $subject_to_sender = "Welcome to NoteBook";
            $message_to_sender = "Thanks for contacting us. If your message contained a query, our team will contact you back within 24 working hours.\n\nThanking you,\nTeam NoteBook";
            
            // Always set content-type when sending HTML email
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <'.$email.'>' . "\r\n";
            $headers .= 'Reply-To: '.$email . "\r\n";
            
            $headers1 = "MIME-Version: 1.0" . "\r\n";
            $headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers1 .= 'From: <'.$to.'>' . "\r\n";
            $headers1 .= 'Reply-To: '.$to . "\r\n";
        
            $mailToAdmin = mail($to,$subject,$message,$headers);
            $mailToUser  = mail($email,$subject_to_sender,$message_to_sender,$headers1);
            if($mailToAdmin && $mailToUser){
                return true;
            }
        }catch(Exception $e){
            echo "Error:".  $e->getMessage();
            print_r($e->getMessage());
        }
    }
    function register(){}
    function login(){}
    // function logout(){
    //     session_unset();
    //     session_destroy();
    //     header("Location: index.php");
    // }
// }

?>