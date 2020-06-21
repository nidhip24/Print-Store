<?php
	// Start the session
	session_start();
	
	include_once("database.php");

	if(isset($_POST["email"]) && isset($_POST["password"])){
		$email = $_POST["email"];
		$pass = $_POST["password"];
        
        $stmt = $conn->prepare("SELECT `email`, `password` FROM `userdata` WHERE email=? and password=?");        
		$stmt->bind_param("ss", $email, $pass);
		$stmt->execute();
		$stmt->bind_result($email, $passwd);
        
        $flag = -1;
		while($stmt->fetch()) {
			echo "found";
			setcookie("username",$email, 0, "/");
			$_SESSION["uname"] = $email;
			$flag = 1;
			break;
		}

		if ($flag==-1) {
			echo "no";
		}

		$stmt->close();
		$conn->close();
    }