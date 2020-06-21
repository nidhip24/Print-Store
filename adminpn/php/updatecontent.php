<?php
	// Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {

	    include_once("../../php/database.php");

	    if (isset($_POST['id']) && isset($_POST['text']) && isset($_POST['charm']) ) {
	    	
	    	$id = $_POST['id'];
	    	$text = $_POST['text'];
	    	$charm = $_POST['charm'];

	    	if( $id>=1 && $text>=1 && $charm>=1 ){

		    	if($stmt = $conn->prepare("UPDATE `productcontent` SET `text`=?, `charm`=? WHERE id=? ")) {
		    		$stmt->bind_param("sss", $text, $charm, $id);
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
		    	echo "Wrong input!";
		    }
	    }else{
	    	echo "Data missing";
	    }
	}else{
		echo "login";
	}
?>