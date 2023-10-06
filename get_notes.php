<?php
include 'conn.php';

if (isset($_POST['chapter_id'])) {
    // Set connection variables
    
    $chapter_id = $_POST['chapter_id'];
    $sql ="SELECT `id`,`notes_title` FROM `notes` WHERE `chapter_id` = ".$chapter_id;

    $res = mysqli_query($con, $sql);

    $rowcount=mysqli_num_rows($res);
    $notesTitle = "";
    if($rowcount > 0){
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

        $notesTitle = $row['notes_title'];
    
        
    
    }
    // if(isset($_SESSION['name'])){
        echo $notesTitle;
    // }else{
        // echo "<script>alert('Please login to view the notes')</script>";
        // echo "Please login to view the notes";
    // }

}
?>