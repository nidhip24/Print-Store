<?php
	// Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {

	    include_once("../../php/database.php");

	    if (isset($_POST['ordernum']) && isset($_POST['stat']) ) {
	    	$ord = $_POST['ordernum'];
	    	$st = $_POST['stat'];

	    	if( $st == "processing" || $st == "intransit" || $st == "delivered" || $st == "cancel" ){

		    	if($stmt = $conn->prepare("UPDATE `order_detail` SET `order_stat`=? WHERE order_num=? ")) {
		    		$stmt->bind_param("ss", $st, $ord);
		            $status = $stmt->execute();

		            //echo "UPDATE `cart` SET `qty`= ".$_POST['qty']." WHERE id=".$_POST['cid'];
		            if ($status===true) {
		            	echo "done";
		            }else{
		            	echo "no";
		            }
		    	}else{
		    		echo "Something went wrong";
		    	}

		    }else{
		    	echo "Wrong status!";
		    }
	    }else{
	    	echo "Data missing";
	    }
	}else{
		echo "login";
	}
?>