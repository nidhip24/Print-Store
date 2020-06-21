<?php 
	
	// Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {
        include_once("../../php/database.php");

    	if ( isset($_POST["name"]) && isset($_POST["per"]) && isset($_POST["startdate"]) && isset($_POST["enddate"]) && isset($_POST["upto"]) && isset($_POST["minim"]) ) {
    		
    		$name = $_POST["name"];
    		$per = $_POST["per"];
    		$st = $_POST["startdate"];
    		$end = $_POST["enddate"];
            $upto = $_POST["upto"];
            $minim = $_POST["minim"];

    		if ($name != "" && $per != "" && $st != "" && $end != "" && $upto != "" && $minim != "" ) {
    			if($stmt = $conn->prepare("INSERT INTO `promocode`( `promocode_name`, `starttime`, `endtime`, `percent`, `upto`, `mininum`) VALUES (?,?,?,?,?,?)" )){

                    $stmt->bind_param("ssssss", $name, $st, $end, $per, $upto, $minim);
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
                echo "something is missing";
            }
    	}else{
            echo "parameter missing";
        }
    }else{
        echo "login";
    }
?>