<?php 
    // Start the session
    session_start();

    include_once("database.php");

    if(isset($_SESSION["uname"]) ){
        $uname = $_SESSION["uname"];                
        
        if(isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["pno"]) && isset($_POST["addr1"]) && isset($_POST["addr2"]) ){
            
            if($stmt = $conn->prepare("INSERT INTO `addr`( `uid`, `name`, `phonenum`, `email`, `addr`) VALUES ((SELECT id from userdata WHERE email=?),?,?,?,?)" )){
                $dr = $_POST["addr1"].$_POST["addr2"];
//                echo $_POST["pno"];
                $stmt->bind_param("sssss", $uname, $_POST['fname'], $_POST["pno"], $_POST["email"], $dr);
                $status = $stmt->execute();

                if ($status === true) {
                    $stmt->close();
                    echo "done";
                }else{
                    echo "Something went wrong!";
                }
    //                        echo "ok";
            }else{
                print_r($conn->error_list);
                echo "no errrror";
            }
                        
            
        }else{
            echo "no";
        }
        
        
    }else{
        echo "login";
    }