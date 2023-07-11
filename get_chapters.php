<?php
include 'conn.php';

if (isset($_POST['subject_id'])) {
    // Set connection variables
    
    $subject = $_POST['subject_id'];
    $sql ="SELECT `id`,`chaptername` FROM `chapters` WHERE `subjectid` = ".$subject;

    $res = mysqli_query($con, $sql);

    $rowcount=mysqli_num_rows($res);
    $chaptersList = "";
    if($rowcount > 0){
        $chaptersList .= '<option>--Select Chapter---</option>';
    
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $chaptersList .= '<option value="'.$row['id'].'">'.$row['chaptername'].'</option>';
        } 
    
    }
    echo $chaptersList;
    

}
?>