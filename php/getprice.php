<?php
	// Start the session
	session_start();

    include_once("database.php");

    if(isset($_POST["cid"]) && isset($_POST["qty"]) ){
        if ($_POST["qty"]>0) {
    	   
            if (isset($_SESSION["uname"])) {
                $uname = $_SESSION["uname"];
                if($stmt = $conn->prepare("SELECT cc.id,pp.price,cc.qty FROM cart as cc,product as pp, userdata as u WHERE cc.ppid=pp.id and cc.uid=(select id from userdata where email=?) GROUP BY cc.id")) {
                    $stmt->bind_param("s",$uname);
                    $stmt->execute();
                    $stmt->bind_result($id,$price,$qty);

                    //echo "UPDATE `cart` SET `qty`= ".$_POST['qty']." WHERE id=".$_POST['cid'];
                    $total=0;
                    while($stmt->fetch()) {
                        //echo $price;
                        $total= $total + ((float)$price*$qty); 
                        
                    }
                    echo $total;
                }else{
                    echo "no";
                }
            }else{
                echo "login";
            }
	    }else{
	    	echo "Quantity cannot be zero or less";
	    }
    }
