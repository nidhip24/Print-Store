<?php 
    // Start the session
    session_start();

    if(isset($_SESSION["uname"]) ){
        $_SESSION["orderproc"] = true;
        echo "done";
    }else{
        echo "login";
    }
?>