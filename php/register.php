<?php 
    include_once("database.php");

	if(isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["pno"]) && isset($_POST["password"]) ){
        if($stmt = $conn->prepare("INSERT INTO `userdata`( `name`, `email`, `password`, `phonenumber`) VALUES (?,?,?,?)" )){
            $stmt->bind_param("ssss", $_POST['fname'],$_POST["email"], $_POST["password"], $_POST["pno"] );
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
    }
?>