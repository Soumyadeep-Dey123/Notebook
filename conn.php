<?php 

$server = "localhost";
$username = "root";
// ntedbuser";
$password = "";
// kIZ^Hb[Ywf-R";

// Create a database connection
$con = mysqli_connect($server, $username, $password);

// Check for connection success
if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}

$retval = mysqli_select_db( $con, 'notebook' );

if(! $retval ) {
    die('Could not select database: ' . mysqli_error($conn));
}