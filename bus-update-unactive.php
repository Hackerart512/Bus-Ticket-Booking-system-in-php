<?php

// session_start();
// if (!isset($_SESSION['username'])) {
//     header("location:login.php");
// }


include("./database.php");

// check session
session_start();
if(!isset($_SESSION['username']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
}
// check session

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} else {

      // get id from view activity
    $busid = $_GET['id'];

    $selectQuery = "UPDATE bus SET `Active_status` = 0 WHERE `Id` = '$busid' ";

    if (mysqli_query($conn, $selectQuery )) {
        echo "<br>. Your Query : $selectQuery .<br>"; 
        // echo "<script>alert('Successfully save your activities')</script>";
        header("location:active-bus.php"); 
    } else {
        echo "<script>alert('ERROR: Hush! Sorry')</script>";

    }
}
?>