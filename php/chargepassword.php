<?php

	if(isset($_POST["token"]) && isset($_POST["password"]) && isset($_POST["cnfpassword"]) ){

		include_once("database.php");

		$t = $_POST["token"];
		$p = $_POST["password"];
		$cp = $_POST["cnfpassword"];

		if ($p==$cp) {
			
			$stmt = $conn->prepare("SELECT `uid` FROM `token` WHERE token=? ");
            $stmt->bind_param("s", $t);
            $stmt->execute();
            $stmt->bind_result($uid);

            $flag = -1;
            
            while($stmt->fetch()) {
            	$stmt->close();

            	$stmt = $conn->prepare("UPDATE `userdata` SET `password`=? WHERE id=?");
				$stmt->bind_param("ss", $p, $uid);
				$status = $stmt->execute();
	            
	            if ($status === true) {
	            	$stmt->close();

	            	$stmt = $conn->prepare("DELETE FROM `token` WHERE token=?");
					$stmt->bind_param("s", $t);
					$status = $stmt->execute();
		            
		            if ($status === true) {
	            		echo "done";
	            	}else{
	            		echo "nol";
	            	}
	            }else{
	            	echo "Failed";
	            }

            }
		}else{
			echo "password doesnot match";
		}
	}else{
		echo "no";
	}