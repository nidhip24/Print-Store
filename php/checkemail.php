<?php
	// Start the session
	session_start();
	
	include_once("database.php");
	include_once 'mail.php';

	if(isset($_POST["email"]) ){
		$email = $_POST["email"];
		// $pass = $_POST["password"];
        
        $stmt = $conn->prepare("SELECT `name`,`email` FROM `userdata` WHERE email=?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($name,$email);
        
        $flag = -1;
		while($stmt->fetch()) {
			
			$stmt->close();

			$token = uniqid('', true);

			

			$body = "<h6>Please click on the below link to reset password.</h6>";
			$body .= "<br>";
			$body .= "<a href='http://localhost/mugshop/reset.php?token=$token'>Click here</a>";		

			$m = new Mail($email, $name, "Reset password", $body);

			$stmt = $conn->prepare("INSERT INTO `token`(`uid`, `token`) VALUES ((SELECT id FROM `userdata` WHERE email=?),?)");
			$stmt->bind_param("ss", $email, $token);
			$status = $stmt->execute();
            
            if ($status === true) {
                $stmt->close();
                // echo "done";
            }else{
                echo "Something went wrong!";
                break;
            }

			echo "found";
			$flag = 1;
			break;
		}

		if ($flag==-1) {
			echo "no";
		}
		// $stmt->close();
		$conn->close();
    }