<?php
    // ----------datbase details----------------------------------------------------------------------
    $server = 'localhost';
    $uname= 'nithin';
    $pass = 'nithin';
    $db = "DB";
    $fname = $lname = $email = $course = $pnumber = $age = $dob = $address = "";
    $connection = mysqli_connect($server,$uname,$pass,$db);
    $sql = 'DELETE from regestrationform where ID ='.$_GET['id'];
    mysqli_query($connection,$sql);
    include 'names_list.php';
    
?>