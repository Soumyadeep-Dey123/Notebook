<?php
include 'conn.php';

if (isset($_POST['chapter_id'])) {
    // Set connection variables
    
    $chapter_id = $_POST['chapter_id'];
    $sql ="SELECT `id`,`playlist_title` FROM `videos` WHERE `chapter_id` = ".$chapter_id;

    $res = mysqli_query($con, $sql);

    $rowcount=mysqli_num_rows($res);
    $videoLink = "";
    if($rowcount > 0){
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

        $videoLink = $row['playlist_title'];
    
        
    
    }
    // if(isset($_SESSION['name'])){
        echo $videoLink;
    

}
?>