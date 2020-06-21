<?php 

    // Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {

        include_once("../../php/database.php");

        if(isset($_POST["id"]) ){
            $id = $_POST["id"];
            $de = 'delete';
    //        echo "UPDATE `products` SET `status` = `delete` WHERE id=$id";
            if($stmt = $conn->prepare("UPDATE `product_type` SET `stat` = ? WHERE id=?")) {
                $stmt->bind_param("ss",$de,$id);
                $status = $stmt->execute();
                
                
                if ($status===true) {
                    echo "done";
                }else{
                    echo "noo";
                }
            }else{
                echo "nooooo";
    //            print_r($conn->error_list);
            }
        }else{
            echo "no";
        }
    }else{
        echo "login";
    }
?>