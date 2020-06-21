<?php 

    // Start the session
    session_start();

    include_once("../../php/database.php");

    if(isset($_POST["username"]) && isset($_POST["password"])){
		$username = $_POST["username"];
		$pass = $_POST["password"];
        
        $stmt = $conn->prepare("SELECT `username`, `password` FROM `admin` WHERE BINARY  username=? and BINARY  password=?");        
		$stmt->bind_param("ss", $username, $pass);
		$stmt->execute();
		$stmt->bind_result($username, $passwd);
        
        $flag = -1;
		while($stmt->fetch()) {
			echo "found";
			// setcookie("username",$username, 0, "/");
			$_SESSION["adminuname"] = $username;
			$flag = 1;
			header("Location: ../index.php");
			exit();
			break;
		}

		if ($flag==-1) {
			echo "<script>alert('Hello! I am an alert box!!');</script>";
			header("Location: ../login.html");
			exit();
		}

		$stmt->close();
		$conn->close();
    }