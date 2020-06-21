<?php 

	// Start the session
	session_start();

    include_once("database.php");
    
    if( isset($_POST["id"]) && isset($_SESSION["uname"]) ){
        
        $uname = $_SESSION['uname'];
        $id = $_POST["id"];
        
        if($stmt = $conn->prepare("DELETE FROM `cart` WHERE uid = (SELECT id from userdata WHERE email=?) and id=? ")) {
            $stmt->bind_param("ss", $uname, $id );
            $status = $stmt->execute();

            if ($status===true) {
                echo "done";
                unset($_SESSION['promocode']);
            }else{
                echo "no";
            }
        }else{
            echo "no";
        }
        
    }else{
        echo "no";
    }
?>