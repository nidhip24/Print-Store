<?php
	// Start the session
	session_start();

    include_once("database.php");

    if(isset($_SESSION["uname"])){
    	$uname = $_SESSION["uname"];
    	if (isset($_POST["name"]) &&  isset($_POST["review-data"]) ) {
    		if($stmt = $conn->prepare("INSERT INTO `review_data`(`uid`, `name`, `info`) VALUES ((SELECT id FROM userdata WHERE email=?),?,?)" )){
	            $stmt->bind_param("sss", $uname, $_POST['name'],$_POST["review-data"] );
	            $status = $stmt->execute();
	            
	            if ($status === true) {
	                $stmt->close();
	                echo "done";
	            }else{
	                echo "Something went wrong!";
	            }
	        }else{
	            print_r($conn->error_list);
	            echo "Try again after sometime!";
	        }
    	}else{
    		echo "Some data not found";
    	}
    }else{
    	echo "Please Login";
    }