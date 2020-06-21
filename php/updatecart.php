<?php
	// Start the session
	session_start();

    include_once("database.php");

    if(isset($_POST["cid"]) && isset($_POST["qty"]) ){

    	if ($_POST["qty"]>0) {
    	
	    	if($stmt = $conn->prepare("UPDATE `cart` SET `qty`= ? WHERE id=?")) {
	    		$stmt->bind_param("ss",$_POST["qty"],$_POST["cid"]);
	            $status = $stmt->execute();

	            //echo "UPDATE `cart` SET `qty`= ".$_POST['qty']." WHERE id=".$_POST['cid'];
	            if ($status===true) {
	            	echo "done";
	            }else{
	            	echo "no";
	            }
	    	}else{
	    		echo "no";
	    	}
	    }else{
	    	echo "Quantity cannot be zero or less";
	    }

    }else{
    	echo "no";
    }