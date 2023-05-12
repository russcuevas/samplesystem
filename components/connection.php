<?php 
    $dbname = 'mysql:host=localhost;dbname=attendance_monitoring';
    $dbuser = 'root';
    $dbpass = '';

    $conn = new PDO($dbname, $dbuser, $dbpass);
    if (!$conn){
        echo"You are not connected";
    }// else{
    //     echo "You are now connected";
    // }
?>