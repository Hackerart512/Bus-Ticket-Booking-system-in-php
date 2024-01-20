<?php

// check session
session_start();
if(!isset($_SESSION['username']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
}
// check session

include("./database.php");

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} else {

    $rowid = $_GET['Id'];
    
    $selectQuery = "DELETE FROM `bus` WHERE `Id` = '$rowid'";
 
    
    if (mysqli_query($conn, $selectQuery)) {

        echo "<br>. Your Query : $sql.<br>"; 
        // echo "<script>alert('Successfully save your activities')</script>";

        header("location:view-bus.php"); // 
    } else {
        echo "<script>alert('ERROR: Hush! Data is not delated')</script>";
    }
}

  
?>