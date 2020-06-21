<?php 
	
	// Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {
        include_once("../../php/database.php");

    	if ( isset($_POST["name"]) && isset($_POST["per"]) && isset($_POST["startdate"]) && isset($_POST["enddate"]) ) {
    		
    		$name = $_POST["name"];
    		$per = $_POST["per"];
    		$st = $_POST["startdate"];
    		$end = $_POST["enddate"];

    		if ($name != "" && $per != "" && $st != "" && $end != "" ) {
    			if($stmt = $conn->prepare("INSERT INTO `discount`( `name`, `per`, `start`, `end`) VALUES (?,?,?,?)" )){

                    $stmt->bind_param("ssss", $name, $per, $st, $end);
                    $status = $stmt->execute();

                    if ($status === true) {
                        $stmt->close();
                        echo "done";
                    }else{
                        echo "Something is wrong";
                    }
                }else{
                    print_r($conn->error_list);
                }
    		}else{
                echo "Something is missing";
            }
    	}else{
            echo "parameter missing";
        }
    }else{
        echo "login";
    }
?>