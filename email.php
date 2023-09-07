<?php 
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
}catch(Exception $e){
    echo "Error:".  $e->getMessage();
    print_r($e->getMessage());
}

?>
