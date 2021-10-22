<?php
    session_start();
    if((isset($_SESSION["rolle"]) && $_SESSION["rolle"] == 'admin')){
        //continue
    } else {
        header("Location: http://brapla16.htl-server.com/supplierung/login.php");
        exit(); //Stop running the script
        // go to form page again.
    }
?>