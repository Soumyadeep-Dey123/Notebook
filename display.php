<?php
include 'conn.php';
$insert = false;
if (isset($_POST['subject_id'])) {
    // Set connection variables
    
    $subject = $_POST['subject_id'];
    $sql ="SELECT `chaptername` FROM `chapters` WHERE `subjectid` = ".$subject;

    $res = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
        echo $chapters = $row['chaptername']."<br>";
    } 
    

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Displaying Chapters</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <!-- <script src='main.js'></script> -->
</head>

<body>
    <?php
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            echo $chapters = $row['chaptername']."<br>";
        } 
    ?>
</body>

</html>

<?php
$con->close();
?>