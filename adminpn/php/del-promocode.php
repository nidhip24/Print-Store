<?php 

    // Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {
        include_once("../../php/database.php");

        if(isset($_POST["id"]) ){
            $id = $_POST["id"];
    //        echo "UPDATE `products` SET `status` = `delete` WHERE id=$id";
            if($stmt = $conn->prepare("DELETE FROM `promocode` WHERE id=?")) {
                $stmt->bind_param("s",$id);
                $status = $stmt->execute();            
                
                if ($status===true) {
                    echo "done";
                }else{
                    echo "Delete failed";
                }
            }else{
                echo "contact developer";
    //            print_r($conn->error_list);
            }
        }else{
            echo "no";
        }
    }else{
        echo "login";
    }
?>